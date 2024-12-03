<?php

namespace App\Http\Controllers\Admin;

use App\Enums\Utility;
use App\Http\Controllers\Controller;
use App\Repositories\VideoRepository;
use Illuminate\Http\Request;
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

    public function store(Request $request)
    {
        $input = $request->except(['_token']);
        $input = $request->all();

        $input['slug'] =  Str::slug($input['title']);

        if (isset($input['thumbnail'])) {
            $img = $this->utility->saveImageVideo($input);
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
        $video = $this->videoRepository->show($id);
        if (empty($video)) {
            return redirect('/404');
        }
        return view('admin.video.edit', compact('video'));
    }

    public function update(Request $request,  $id)
    {
        $input = $request->except(['_token']);
        $input['slug'] =  Str::slug($input['title']);
        if (isset($input['thumbnail'])) {
            $input['thumbnail']->move(public_path('images/upload/video/'), $input['thumbnail']->getClientOriginalName());
            $path = '/images/upload/video/' . $input['thumbnail']->getClientOriginalName();
            $input['thumbnail'] = $path;
        }
        $input = $this->videoRepository->update($input, $id);

        return redirect()->route('video.index')->with('success',  __(' Video updated success'));
    }


    public function destroy( $id)
    {
        $this->videoRepository->destroy($id);
        return back()->with('success', __('Video delete success'));
    }

}
