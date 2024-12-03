<?php

namespace App\Http\Controllers;

use App\Enums\Utility;
use App\Repositories\CategoryPostRepository;
use App\Repositories\LeagueRepository;
use App\Repositories\PlayerPostRepository;
use App\Repositories\PostRepository;
use App\Repositories\UserLeagueRepository;
use App\Repositories\UserRepository;
use App\Repositories\ProductRepository;
use App\Repositories\ScheduleRepository;
use App\Repositories\RefereeRepository;
use App\Repositories\ResultRepository;
use App\Repositories\VideoRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Config;
use Session;

class HomeController extends Controller
{
    protected $userRepository;
    protected $scheduleRepository;
    protected $utility;
    protected $postRepository;
    protected $categoryPostRepository;
    protected $playerRepository;
    protected $videoRepository;

    public function __construct(
        UserRepository $userRepository,
        ScheduleRepository $scheduleRepository,
        Utility $ultity,
        PostRepository $postRepository,
        CategoryPostRepository $categoryPostRepository,
        PlayerPostRepository $playerRepository,
        VideoRepository $videoRepository
    ) {
        $this->videoRepository = $videoRepository;
        $this->userRepository = $userRepository;
        $this->scheduleRepository = $scheduleRepository;
        $this->utility = $ultity;
        $this->postRepository = $postRepository;
        $this->categoryPostRepository = $categoryPostRepository;
        $this->playerRepository = $playerRepository;
    }

    public function viewHome()
    {
        $videos = $this->videoRepository->index();
        return view('page.homepage', compact('videos'));
    }

    public function viewSearch(Request $request)
    {
        $search = $request->get('search');
        $isList = false;
        $listLeagues = [];
        if ($search) {
            $listLeagues = $this->leagueRepository->getLeagueBySearch($search);
            if (count($listLeagues) > 0) {
                $isList = true;
            }
        }

        return view('page.search', compact('listLeagues', 'search', 'isList'));
    }


    public function viewAbout()
    {
        $listPosts = $this->postRepository->listPostLimit();
        return view('page.about', compact('listPosts'));
    }


    public function team()
    {
        $listGoalkeeper = $this->playerRepository->goalkeeper();
        $defender = $this->playerRepository->defender();
        $midfielder = $this->playerRepository->midfielder();
        $forward = $this->playerRepository->forward();
        return view('page.team', compact('listGoalkeeper', 'defender', 'midfielder','forward'));
    }

    public function saveRegisterLeague(Request $request)
    {
        $startDate = strtotime($request['start_date']);
        $dateCurrent =  strtotime(date("Y-m-d"));

        if ($dateCurrent >= $startDate) {
            abort(404);
        }
        $userRegisterLeague = $request->except(['_token']);
        $this->userLeagueRepository->store($userRegisterLeague);

        return back()->with('message', 'You are allowed to access');
    }


    public function news()
    {
        $listNews = $this->postRepository->index();
        $firstNews = $this->postRepository->firstNew();
        $categories = $this->categoryPostRepository->index();
        $listNewsPopulars = $this->postRepository->getNewsPopular();
        return view('page.post.list', compact('listNews', 'listNewsPopulars', 'categories','firstNews'));
    }

    public function newsDetail($slug)
    {
        $newData = $this->postRepository->detailPost($slug);
        $listNewsPopulars = $this->postRepository->getNewsPopular();
        $listNewsNormals = $this->postRepository->getNewsNormal();
        return view('page.post.detail', compact('newData', 'listNewsNormals','listNewsPopulars'));
    }

    public function newsCategory($slug)
    {
        $postCategory = $this->categoryPostRepository->postCategory($slug);
        $categories = $this->categoryPostRepository->index();
        $listNewsPopulars = $this->postRepository->getNewsPopular();
        $listNewsNormals = $this->postRepository->getNewsNormal();
        return view('page.post.category-post', compact('postCategory', 'categories', 'listNewsPopulars', 'listNewsNormals'));

    }


}
