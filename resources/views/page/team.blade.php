@extends('layouts.page')

@section('title')
{{ env('APP_NAME', 'Badminton.io') }} - {{ __('Hung Ha FC') }}
@endsection
<style>
    .box-historical #list-historical {
        box-sizing: border-box;
        margin: 0;
        padding: 0;
        display: flex;
        flex-wrap: wrap;
    }
    .box-historical #list-historical .item-single {
        box-sizing: border-box;
        overflow: hidden;
        background: darkgray;
        border-left: 2px solid #fff;
        border-top: 2px solid #fff;
        display: flex;
        flex-direction: column;
    }

    .player-number {
        width: 20%;
        font-size: 30px;
        font-weight: 700;
        color: white;
    }

    .player-name {
        width: 80%;
        font-size: 25px;
        font-weight: 700;
        color: white;
    }

    .box-historical {
        margin-top: 50px;
    }

    .item-player {
        position: relative;
        transition: .4s;
    }

    .item-player .link {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: 1;
    }

    .item-player .img img {
        width: 100%;
        vertical-align: middle;

    }

    .item-player .img:before {
        content: "";
        position: absolute;
        left: 0;
        bottom: 0;
        width: 100%;
        height: 100%;
        background-image: linear-gradient(0deg, rgba(68, 73, 77, .6588235294), rgba(68, 73, 77, .0117647059));
        transition: .4s;
        clip-path: polygon(7% 0, 100% 0, 100% 100%, 0 100%, 0 7%);
    }

    .item-player .img:after {
        transition: .2s;
        background-image: linear-gradient(0deg, #44494d, rgba(68, 73, 77, .2901960784));
        height: 50%;
    }

    .item-player .img:after, .item-player .img:before {
        content: "";
        position: absolute;
        left: 0;
        bottom: 0;
        width: 100%;
        height: 100%;
        background-image: linear-gradient(0deg, rgba(68, 73, 77, .6588235294), rgba(68, 73, 77, .0117647059));
        transition: .4s;
        clip-path: polygon(7% 0, 100% 0, 100% 100%, 0 100%, 0 7%);
    }

    .img:hover img {
        transform: scale(1.1); /* Zoom in effect */
        opacity: 0.7; /* Change opacity */
        zoom: 1.2;
    }

    .item-player .ct {
        color: #fff;
        position: absolute;
        width: 100%;
        bottom: 0;
        left: 0;
        padding: 10px;
    }

    .item-player .ct .top {
        text-align: center;
        text-transform: uppercase;
        transition: .2s;
    }

    .item-player .ct .top .name {
        font-weight: 500;
        font-size: 25px;
        color: #fff;
    }

    .item-player .ct .top .location {
        font-weight: 300;
    }

    .inner-img {
        transition: 0.3s;
    }

    .inner-img:hover {
        transform: scale(1.1);
    }

    .news-overview-item {
        display: flex;
        flex-direction: column;
        width: 25%;
        background-color: #333;
        border: 15px solid #fff;
    }

    .news-overview-wrap {
        display: flex;
        flex-wrap: wrap;
        align-items: normal;
        justify-content: flex-start;
    }

    .title-player {
        padding: 10px;
        margin-top: 10px;
    }
</style>
@section('content')
    <div class="box-historical container">
        <!-- Display tournament details -->
        <div class="d-home-box">
            <div class="is-title">
                <h4 style="color:black;">Danh sách thành viên đội bóng <i class='fas fa-angle-double-right'></i></h4>
                <a href="">
                    <i class="bi bi-chevron-double-right"></i>
                </a>
            </div>
        </div>
        <div class="title-player">
            <div class="">
                <h3>THỦ MÔN</h3>
            </div>
        </div>
        <div class="news-overview-wrap">
            @foreach($listGoalkeeper as $player)

            <div class="news-overview-item">
                <div class="item-player v2 inner-img">
                    <a href="https://viettelsports.vn/doi-bong/cau-thu/737/ngo-xuan-son" title="{{$player->name}}" class="link"></a>
                    <div class="img"><img src="{{asset($player->avatar)}}" ></div>
                    <div class="ct">
                        <div class="top">
                            <h3 class="name fz26">{{$player->number_shirt}} - {{$player->name}}</h3>
                        </div>

                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="title-player">
            <div class="">
                <h3>HẬU VỆ</h3>
            </div>
        </div>
        <div class="news-overview-wrap">
            @foreach($defender as $player)
                <div class="news-overview-item ">
                    <div class="item-player v2 inner-img">
                        <a href="https://viettelsports.vn/doi-bong/cau-thu/737/ngo-xuan-son" title="{{$player->name}}" class="link"></a>
                        <div class="img"><img src="{{asset($player->avatar)}}" ></div>
                        <div class="ct">
                            <div class="top">
                                <h3 class="name fz26">{{$player->number_shirt}} - {{$player->name}}</h3>
                            </div>

                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="title-player">
            <div class="">
                <h3>TIỀN VỆ</h3>
            </div>
        </div>
        <div class="news-overview-wrap">
            @foreach($midfielder as $player)
                <div class="news-overview-item">
                    <div class="item-player v2 inner-img">
                        <a href="https://viettelsports.vn/doi-bong/cau-thu/737/ngo-xuan-son" title="{{$player->name}}" class="link"></a>
                        <div class="img"><img src="{{asset($player->avatar)}}" ></div>
                        <div class="ct">
                            <div class="top">
                                <h3 class="name fz26">{{$player->number_shirt}} - {{$player->name}}</h3>
                            </div>

                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="title-player">
            <div class="">
                <h3>TIỀN ĐẠO</h3>
            </div>
        </div>
        <div class="news-overview-wrap">
            @foreach($forward as $player)
                <div class="news-overview-item">
                    <div class="item-player v2 inner-img">
                        <a href="https://viettelsports.vn/doi-bong/cau-thu/737/ngo-xuan-son" title="{{$player->name}}" class="link"></a>
                        <div class="img"><img src="{{asset($player->avatar)}}" ></div>
                        <div class="ct">
                            <div class="top">
                                <h3 class="name fz26">{{$player->number_shirt}} - {{$player->name}}</h3>
                            </div>

                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>


@endsection
