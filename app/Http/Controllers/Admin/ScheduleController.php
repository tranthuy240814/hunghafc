<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ResultScheduleRequest;
use App\Http\Requests\ScheduleRequest;
use App\Repositories\ScheduleRepository;
use App\Repositories\LeagueRepository;

class ScheduleController extends Controller
{
    protected $scheduleRepository;
    protected $leagueRepository;

    public function __construct(
        ScheduleRepository $scheduleRepository,
        LeagueRepository $leagueRepository

    ) {
        $this->scheduleRepository = $scheduleRepository;
        $this->leagueRepository = $leagueRepository;
    }

    public function index()
    {
        $listSchedule = $this->scheduleRepository->index();
        return view('admin.schedule.index', compact('listSchedule'));
    }

    public function create()
    {
        $listLeague = $this->leagueRepository->index();
        return view('admin.schedule.create', compact('listLeague'));
    }

    public function store(ScheduleRequest $request)
    {
        $input = $request->except(['_token']);
        $data = $this->scheduleRepository->store($input);

        return redirect('list-schedule')->with('success', 'Create schedule successfully!');
    }

    public function show($id)
    {
        $dataSchedule = $this->scheduleRepository->showInfo($id);
        return view('admin.schedule.show', compact('dataSchedule'));
    }

    public function update(ResultScheduleRequest $request, $id)
    {
        $input = $request->except(['_token']);
        $data = $this->scheduleRepository->update($input, $id);
        return redirect()->to('result');
    }

    public function result()
    {
        $dataResult = $this->scheduleRepository->index();
        return view('admin.schedule.result', compact('dataResult'));
    }
}
