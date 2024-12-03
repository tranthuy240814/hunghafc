@extends('layouts.page')

@section('title')
    HungHaFC- {{ __('Homepage') }}
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('css/page/homepage.css') }}" type="text/css" media="all"/>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
@endsection

@section('content')
    <div class="wrapper">
        <div class="container">
            <section>
                <div class="d-home-box">
                    <div class="is-title">
                        <h4 style="color:black;">Video <i class='fas fa-angle-double-right'></i></h4>
                        <a >
                            <i class="bi bi-chevron-double-right"></i>
                        </a>
                    </div>
                </div>
                <section id="news" class="news-section ">
                    <div class="">
                        <div class="news-overview-wrap">
                            @foreach($firstVideo as $video)
                                <div class="news-overview">
                                    <div class="news-overview-image">
                                        <a href="{{ $video->url }}" target="_blank">
                                            <img src="{{asset($video->thumbnail)}}" alt=""
                                                 class="img-responsive-hover b-error">
                                        </a>
                                    </div>

                                    <div class="news-overview-text">
                                        <h4 class="media-heading fw-400 fs-16px">
                                            <a href="https://badominton.io/news/se-ra-sao-neu-ban-mang-giay-the-thao-mon-khac-vao-choi-cau-long"
                                               title="Sẽ ra sao nếu bạn mang giày thể thao môn khác vào chơi cầu lông?">
                                                {{$video->title}}  </a>
                                        </h4>
                                        <span class="fw-300 fs-12px text-gray"
                                              style="color: #fff; line-height: 1.5em; transition: .35s color ease-in-out;">
                                            <?php echo date_format($video->created_at, 'd-F-Y')  ?><br>
                                        </span>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="" style="margin-top: -9px;">
                        </div>
                    </div>

                </section>
            </section>
            <section id="news" class="news-section " style="margin-top: 5%">
            <div class="">
                <div class="news-overview-wrap">
                    @foreach($videos as $video)
                        <div class="news-overview-item" style="width: 33.33%;">
                            <div class="news-overview-image">
                                <a href="{{ $video->url }}">
                                    <img src="{{asset($video->thumbnail)}}" alt="" class="img-responsive-hover b-error">
                                </a>
                            </div>

                            <div class="news-overview-text" style="border-top: 0px">
                                <h4 class="media-heading fw-400 fs-16px">
                                    <a href="{{$video->url}}"  target="_blank">
                                        {{$video->title}}  </a>
                                </h4>
                                <span class="fw-300 fs-12px text-gray"
                                      style="color: #fff; line-height: 1.5em; transition: .35s color ease-in-out;">
                      <?php echo date_format($video->created_at, 'd-F-Y')  ?><br>
                    </span>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="" style="margin-top: -9px;">
                </div>
            </div>

        </section>
        </div>

        <div class="partners-section-wrap">
            <div class="partners-section">
                <div class="partners-left" style="margin-bottom: 100px">

                </div>
            </div>
        </div>

    </div>
@endsection
