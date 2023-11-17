@extends('layouts.page')
@section('title')
    Chi tiết giải đấu
@endsection
@section('content')

    <style>
        body {
            text-align: center;
        }

        .tooltip {
            position: relative;
            cursor: default;
            opacity: 1;
            display: flex;
        }

        .tooltip .tooltiptext {
            visibility: hidden;
            padding: 0.25em 0.5em;
            color: black;
            text-align: center;
            border-radius: 0.25em;
            white-space: nowrap;
            margin-top: auto;
            transition-property: visibility;
            transition-delay: 0s;
            border-style: solid;
            border-color: #0c0c0c;
            border-width: 1px;
            margin-left: 40%;
            margin-bottom: 25%;
        }

        .tooltip:hover .tooltiptext {
            visibility: visible;
            transition-delay: 0.3s;

        }
    </style>
<div class="container" style="background: white; border-radius: 10px; padding: 10px">
    <div class="row">
        <div class="col-lg-2">
            <img width="150" class="" src="{{ $tourInfo->image }}">
        </div>
        <div class="col-lg-6 "style="text-align: left">
            <h2 class="">{{ $tourInfo->name }}</h2>
            <p class=" ">{{ $tourInfo->type }}</p>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-2 " style="margin-top: 35px;">
            <h5>Các giải đấu khác</h5>
            <div class="mt-4" style="text-align: left">
                @foreach($listTournament as $dataTour)
                    <div style="font-size: 14px; font-weight: 500; padding: 7px;"><i class='fas fa-baseball-ball'></i>
                        <a href="{{route('tour.info', $dataTour['slug'])}}" style="color: black">
                            {{ $dataTour->name }}
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="col-lg-10">
            <div class="container" style="background: white; border-radius: 10px">
                <h2>Chi tiết giải đấu</h2>
                <div>
                    @forelse($groupSchedule as $match => $schedules)
                        <div style="background: #eee; border-radius: 10px">
                            Vòng đấu: {{ $match }}
                        </div>
                        @foreach($schedules as $schedule)
                            <div class="row mt-4 tooltip btn_delete" data-toggle="modal"
                                 data-target="#ModalCreate " id="evenClick">
                                <?php $date = date("m-d-Y", strtotime($schedule->date)) ?>
                                <div class="col-lg-3">Thời gian: {{ $schedule->time }} : {{ $date }}</div>
                                <div class="col-lg-3">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <img class="image" src="{{ $schedule->team1->image }}" alt="avatar"
                                                 style=" width: 15px; border-radius: 10px; margin-right: 15px;">
                                            {{ $schedule->team1->name }}
                                        </div>
                                        <div class="col-lg-12 mt-4">
                                            <img class="image" src="{{ $schedule->team2->image }}" alt="avatar"
                                                 style=" width: 15px; border-radius: 10px; margin-right: 15px;">
                                            {{ $schedule->team2->name }}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-1">
                                    <div class="row" style="font-weight: 800">
                                        <div class="col-lg-12">
                                            {{ $schedule->result_team_1  ?? "-"}}
                                        </div>
                                        <div class="col-lg-12 mt-4">
                                            {{ $schedule->result_team_2  ?? "-"}}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="row">
                                            <div class="col-lg-2">
                                                {{ $schedule->set_1_team_1 ?? "-"}}
                                            </div>
                                            <div class="col-lg-2">
                                                {{ $schedule->set_2_team_1 ?? "-"}}
                                            </div>
                                            <div class="col-lg-2">
                                                {{ $schedule->set_3_team_1 ?? "-"}}
                                            </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 mt-4">
                                            <div class="row">
                                                <div class="col-lg-2">
                                                    {{ $schedule->set_1_team_2 ?? "-"}}
                                                </div>
                                                <div class="col-lg-2">
                                                    {{ $schedule->set_2_team_2 ?? "-"}}
                                                </div>
                                                <div class="col-lg-2">
                                                    {{ $schedule->set_3_team_2 ?? "-"}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="">
                                    <span class="tooltiptext">Click để xem chi tiết trận đấu</span>
                                </div>
                            </div>
                            <div class="modal fade text-left" id="ModalCreate" style="z-index: 99999" tabindex="-1"
                                 role="dialog" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content" style="height: 400px;">
                                        <div class="modal-header">
                                            <h4 class="modal-title">{{$schedule->tournament->name}}</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            </button>
                                        </div>
                                        <div class="row justify-content-start m-1 mb-2 mt-2">
                                            <button type="submit" class="btn btn-success "
                                                    style="width: 90px">{{__('Vòng')}}: {{$schedule->match}}</button>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group text-center">
                                                    <div class="" style="display: inline-grid;">
                                                        <input value="" type="file" class="border-0 bg-light pl-0"
                                                               name="image" id="image" hidden>
                                                        <div class=" choose-avatar">
                                                            <div id="btnimage">
                                                                <img class="show-avatar"
                                                                     style="width:150px; height: 150px; border-radius: 50%"
                                                                     src="{{$schedule->team1->image}}" alt="avatar">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="text-center">
                                                    <strong>{{$schedule->team1->players[0]->name}}</strong>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 text-center"
                                                 style="vertical-align: middle;line-height: 120px;">
                                                <?php $date = date("m-d-Y", strtotime($schedule->date)) ?>
                                                <strong>{{$schedule->time}} &nbsp {{$date}} </strong>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group text-center">
                                                    <div class="" style="display: inline-grid;">
                                                        <input value="" type="file" class="border-0 bg-light pl-0"
                                                               name="image" id="image" hidden>
                                                        <div class=" choose-avatar">
                                                            <div id="btnimage">
                                                                <img class="show-avatar"
                                                                     style="width: 150px; height: 150px; border-radius: 50% "
                                                                     src="{{$schedule->team2->image}}" alt="avatar">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="text-center">
                                                    <strong>{{$schedule->team2->players[0]->name}}</strong>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        @endforeach

                        <hr>
                    @empty
                        <h5>Chưa cập nhập lịch thi đấu </h5>
                    @endforelse

                </div>
            </div>
        </div>
    </div>

    @endsection
    @section('js')
    <script src="{{ asset('js/eventSchedule.js') }}"></script>
@endsection
