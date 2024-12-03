<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\ScheduleRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Enums\Utility;
use Excel;

class ScheduleController extends Controller
{
    protected $scheduleRepository;
    protected $utility;

    public function __construct(
        ScheduleRepository $scheduleRepository,
        Utility $utility
    ) {
        $this->scheduleRepository = $scheduleRepository;
        $this->utility = $utility;
    }

    public function index()
    {
        $user = Auth::user()->id;
        $rounds =  Ranking::RANKING_ARRAY_ROUND;
        $listSchedules = $this->scheduleRepository->index();

        return view('admin.schedule.index', compact('listSchedules', 'listLeagues', 'rounds'));
    }

    public function create()
    {
        return view('admin.schedule.create');
    }

    public function store(Request $request)
    {
        $input = $request->except(['_token']);
        $input = $request->all();
        if (isset($input['logo_team_2'])) {
            $img = $this->utility->saveImageSchedule($input);
            if ($img) {
                $path = '/images/upload/schedule/' . $input['logo_team_2']->getClientOriginalName();
                $input['logo_team_2'] = $path;
            }
        }
        $data = [
          'match' => $input['match'],
          'time' => $input['time'],
          'date' => $input['date'],
          'stadium' => $input['stadium'],
          'team1' => "FC Hưng Hà",
          'team2' => $input['team2'],
          'logo_team_1' => asset('/images/logo-hungha.jpeg'),
          'logo_team_2' => $input['logo_team_2'],
        ];

        $this->scheduleRepository->store($data);

        return redirect('list-schedule')->with('success', 'Create schedule successfully!');
    }

    public function edit($id)
    {
        $dataSchedule = $this->scheduleRepository->showInfo($id);

        return view('admin.schedule.edit', compact('dataSchedule'));
    }

    public function update(Request $request, $id)
    {
        $input = $request->except(['_token']);
        $this->scheduleRepository->updateLeague($input, $id);
        return redirect('list-schedule')->with('success', 'Schedule successfully updated.');
    }

    public function show($id)
    {
        $dataSchedule = $this->scheduleRepository->showInfo($id);

        return view('admin.schedule.show', compact('dataSchedule'));
    }

}
