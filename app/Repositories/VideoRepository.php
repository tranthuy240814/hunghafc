<?php

namespace App\Repositories;

use App\Models\Post;
use App\Models\Video;

class VideoRepository extends BaseRepository
{
    public function model()
    {
        return Video::class;
    }

    public function index()
    {
        return $this->model->orderBy('created_at', 'desc')->take(9)->get();
    }

    public function firstVideo()
    {
        return $this->model->orderBy('created_at', 'desc')->take(1)->get();
    }

    public function videoHomepage()
    {
        return $this->model->orderBy('created_at', 'desc')->take(4)->get();
    }

    public function store($input)
    {
        return $this->model->create($input);
    }

    public function show($id)
    {
        return $this->model->where('id', $id)->first();
    }

    public function update($input, $id)
    {
        return $this->model->where('id', $id)->update($input);
    }

    public function destroy($id)
    {
        return $this->model->where('id', $id)->delete();
    }

}
