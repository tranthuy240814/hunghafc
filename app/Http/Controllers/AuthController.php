<?php

namespace App\Http\Controllers;

use App\Enums\Role;
use App\Enums\Utility;
use App\Mail\VerifyEmail;
use App\Models\User;
use App\Models\Message;
use App\Enums\Title;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\VerifyUser;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Repositories\GroupUserRepository;
use App\Events\MessageSent;
use App\Repositories\GroupRepository;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redis;
use Illuminate\Http\Request;
use Hash;
use Illuminate\Support\Str;
use Session;

class  AuthController extends Controller
{
    protected $groupUserRepository;
    protected $groupRepository;
    protected $utility;

    public function __construct(
        GroupUserRepository $groupUserRepository,
        GroupRepository $groupRepository,
        Utility $ultity
    ) {
        $this->groupUserRepository = $groupUserRepository;
        $this->groupRepository = $groupRepository;
        $this->utility = $ultity;
    }

    public function login()
    {
        return view('auth.login');
    }

    public function customLogin(LoginRequest $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->put('email', $credentials['email']);
            if (Auth::user()->role == Role::ADMIN) {
                return redirect('dashboard');
            } else {
                if ($request->get('return_url')) {
                    $return_url = $request->get('return_url');
                    return redirect($return_url);
                }

                return redirect('/');
            }
        } else {
            return back()->withErrors([
                'custom' => 'Email or Password is wrong!'
            ]);
        }
    }

    public function dashboard()
    {
        if (Auth::check()) {
            return view('layouts.admin');
        }

        return redirect("login")->withSuccess('You are not allowed to access');
    }

    public function signOut()
    {
        Session::flush();
        Auth::logout();

        return Redirect('login');
    }

    public function registerUser()
    {
        return view('auth.registerUser');
    }

    public function storeUser(RegisterRequest $request)
    {
        $user = User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'role' => Role::USER,
            'title' => Title::USER
        ]);

        $token = Str::random(60);
        VerifyUser::create([
            'token' => $token,
            'user_id' => $user->id,
        ]);

        Mail::send('emails.verifyEmail', ['token' => $token], function($message) use($request){
            $message->to($request->email);
            $message->subject('Email Verification Mail');
        });

        return \redirect()->route('login')->with('success', 'Please click on the link sent to your email');
    }

    public function verifyEmail($token)
    {
        $verifyUser = VerifyUser::where('token', $token)->first();
        $currentDateTime = date('Y-m-d H:i:s');
        $message = 'Sorry your email cannot be identified.';

        if(!is_null($verifyUser) ){
            $dataUser = $verifyUser->user;

            if(!$dataUser->email_verified_at) {

                $dataUser->email_verified_at = $currentDateTime;
                $dataUser->save();
                $message = "Your e-mail is verified. You can now login.";
            } else {
                $message = "Your e-mail is already verified. You can now login.";
            }
        }

        return redirect()->route('login')->with('message', $message);
    }

    public function profile()
    {
        return view('page.user.profile');
    }

    public function viewMyGroup()
    {
        $getGroup = $this->groupUserRepository->getGroupByUserId(Auth::user()->id);
        $listGroup = $this->utility->paginate($getGroup, 30, '/my-group');

        return view('page.user.my-group', compact('listGroup'));
    }

    public function joinGroup()
    {
    }

    public function fetchMessages(Request $request)
    {
        $group_id = $request->get('g_i');
        return Message::with('users')->where('user_id', Auth::user()->id)->where('group_id', $group_id)->get();
    }

    public function sendMessage(Request $request)
    {
        try {
            Redis::connect(env('REDIS_HOST', '127.0.0.1'), 3306);
            $user = Auth::user();
            $message = $request->get('message');
            $group_id = $request->get('g_i');

            if ($message == null or $group_id == null) {
                abort(403);
            }

            $isJoined = $this->groupUserRepository->checkJoinedGroupByName($user->id, $group_id);
            if (empty($isJoined)) {
                abort(403);
            }

            $message = $user->messages()->create([
                'message' => $message,
                'group_id' => $group_id
            ]);

            broadcast(new MessageSent($user, $message, $group_id))->toOthers();

            return ['status' => 'Message Sent!'];
        } catch (\Predis\Connection\ConnectionException $e) {
            return response('error connection redis');
        }
    }
}
