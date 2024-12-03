<?php

namespace App\Http\Controllers\Admin;

use App\Enums\Utility;
use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use App\Http\Requests\PostUpdateRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Repositories\VideoRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class VideoController extends Controller
{
    private $videoRepository;
    private $utility;

    public function __construct(
        VideoRepository $videoRepository,
        Utility $utility
    )
    {
        $this->videoRepository = $videoRepository;
        $this->utility = $utility;
    }

    public function index()
    {
        $listVideos= $this->videoRepository->index();
        return view('admin.video.index',compact('listVideos'));
    }

    public function create()
    {
        return view('admin.video.create');
    }

    public function store(PostRequest $request)
    {
        $input = $request->except(['_token']);
        $input = $request->all();
        $input['slug'] =  Str::slug($input['title']);
        $input['author'] = Auth::user()->id;

        if (isset($input['thumbnail'])) {
            $img = $this->utility->saveImagePost($input);
            if ($img) {
                $path = '/images/upload/video/' . $input['thumbnail']->getClientOriginalName();
                $input['thumbnail'] = $path;
            }
        }
        $this->videoRepository->create($input);

        return redirect()->route('video.index')->with('success',  __('Video created success'));
    }

    public function edit($id)
    {
        $post = $this->videoRepository->show($id);
        if (empty($post)) {
            return redirect('/404');
        }
        return view('admin.video.edit', compact('post'));
    }

    public function update(PostUpdateRequest $request,  $id)
    {
        $input = $request->except(['_token']);
        $input['slug'] =  Str::slug($input['title']);
        if (isset($input['thumbnail'])) {
            $input['thumbnail']->move(public_path('images/upload/video/'), $input['thumbnail']->getClientOriginalName());
            $path = '/images/upload/video/' . $input['thumbnail']->getClientOriginalName();
            $input['thumbnail'] = $path;
        }
        $input = $this->videoRepository->update($input, $id);

        return redirect()->route('post.index')->with('success',  __(' Video updated success'));
    }


    public function destroy( $id)
    {
        $this->videoRepository->destroy($id);
        return back()->with('success', __('Video delete success'));
    }

}
