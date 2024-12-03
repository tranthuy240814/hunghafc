@extends('layouts.page')

@section('title')
    {{ env('APP_NAME', 'Badminton.io') }} - {{ __('Hung Ha FC') }}
@endsection
<style>
    .box-results-tournament {
        background-color: lightgrey;
    }

    .wrapper-results:before {
        content: "";
        z-index: 2;
        position: absolute;
        height: 47%;
        background-color: #184931;
        width: 10px;
    }

    .wrapper-results {
        margin-top: 10px;
    }

    .c-name {
        padding: 20px;
    }

    .c-name span{
        font-weight: 200;
    }


</style>
@section('content')
    <div class="box-historical container">
        <div class="d-home-box">
            <div class="is-title">
                <h4 style="color:black;">Lịch thi đấu <i class='fas fa-angle-double-right'></i></h4>
                <a href="">
                    <i class="bi bi-chevron-double-right"></i>
                </a>
            </div>
        </div>
        <section id="next-tournament" class="next-tournament-section  ">
            <div class="next-tournament-wrap container">
                <div class="results">
                    @foreach($dataSchedule as $item)
                    <div class="wrapper-results">
                        <div class="box-results-tournament">
                            <div class="box-results-tournament-left">
                                <div class="logo-left">
                                    <div class="c-name"><span>{{$item->date}} {{$item->time}}</span>&nbsp;&nbsp;|&nbsp;&nbsp;<span>{{$item->stadium}}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="box-results-tournament-right">
                                <div class="c-left-team d-flex">
                                    <div class="c-name">Hưng Hà</div>
                                    <div class="c-img">
                                        <img src="{{asset('/images/logo-hungha.jpeg')}}" width="150px">
                                    </div>
                                </div>
                                @if(isset($item->result_team_1))
                                <div class="c-name" style="padding: 20px; font-size: 20px; "><span style="font-weight: 600">{{$item->result_team_1}} - {{$item->result_team_2}}</span></div>
                                @else
                                <div class="c-name" style="padding: 20px; font-size: 30px"><span>- -</span></div>
                                @endif
                                <div class="c-left-team d-flex">
                                    <div class="c-img">
                                        <img
                                            src="{{asset($item->logo_team_2 ?? '/images/team_default.png')}}" width="150px">
                                    </div>
                                    <div class="c-name">{{$item->team2}}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
        </section>
    </div>


@endsection
