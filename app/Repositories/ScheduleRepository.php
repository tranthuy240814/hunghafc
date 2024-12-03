<?php

namespace App\Repositories;

use App\Models\Schedule;

class ScheduleRepository extends BaseRepository
{
    public function model()
    {
        return Schedule::class;
    }

    public function store($dataSchedule)
    {
        return $this->model->create($dataSchedule);
    }

    public function index()
    {
        return $this->model->orderBy('created_at', 'desc')->get();
    }

    public function showInfo($id)
    {
        return $this->model->where('id', $id)->first();
    }

    public function updateLeague($input, $id)
    {
        return $this->model->where('id', $id)->update($input);
    }

}
