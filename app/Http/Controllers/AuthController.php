<?php

namespace App\Http\Controllers;

use App\Enums\Role;
use App\Enums\Utility;
use App\Mail\VerifyEmail;
use App\Models\User;
use App\Enums\Title;
use App\Enums\Group;
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
        VerifyUser::create([
            'token' => Str::random(60),
            'user_id' => $user->id,
        ]);

        Mail::to($user->email)->send(new VerifyEmail($user));
        return \redirect()->route('login')->with('success', 'Please click on the link sent to your email');
    }

    public function verifyEmail($token)
    {
        $verifiedUser = VerifyUser::where('token', $token)->first();
        if (isset($verifiedUser)) {
            $user = $verifiedUser->user;
            if (!$user->email_verified_at) {
                $user->email_verified_at = Carbon::now();
                $user->save();
                return \redirect(route('login'))->with('success', 'Your email has been verified');
            } else {
                return \redirect()->back()->with('info', 'Your email has already been verified');
            }
        } else {
            return \redirect(route('login'))->with('error', 'Something went wrong!!');
        }
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

    public function joinGroup(Request $request)
    {
        $nameGroup = $request->get('g_i');
        if (empty($nameGroup)) {
            return 'fail';
        }

        $getGroup = $this->groupRepository->getGroupByName($nameGroup);
        if (empty($getGroup)) {
            return 'fail';
        }

        $user = Auth::user();
        if ($getGroup->status == Group::STATUS_PRIVATE) {
            $group_users = $this->groupUserRepository->checkJoinedGroupByName($user->id, $getGroup->id);
            if (empty($group_users)) {
                $data = [
                    'group_id' => $getGroup->id,
                    'user_id' => $user->id,
                    'status_request' => Group::STATUS_REQUESTED
                ];
                $this->groupUserRepository->create($data);

                return 'wait';
            } else {
                if ($group_users->status_request == Group::STATUS_REJECTED) {
                    return 'reject';
                }
            }
        } else {
            $data = [
                'group_id' => $getGroup->id,
                'user_id' => $user->id,
                'status_request' => Group::STATUS_ACCEPTED
            ];
            $this->groupUserRepository->create($data);
        }

        return 'success';
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

            return ['status' => 'sent'];
        } catch (\Predis\Connection\ConnectionException $e) {
            return response('error connection redis');
        }
    }
}
