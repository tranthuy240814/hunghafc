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

        <section>
            <div>
                <img class=" b-error b-error" width="100%" style="margin-top: -25%"
                     src="{{ asset('images/hunghafc.jpg') }}">
            </div>
        </section>
        <div class="c-intro-home">
            <div class="container">
                <div class="d-home-box">
                    <div class="c-intro-home__box clearfix">
                        <div class="is-left">
                            <div class="is-title"><h4>Giới thiệu</h4><a href="/gioi-thieu"><i
                                        class="bi bi-chevron-double-right"></i></a></div>
                            <div class="b-maincontent"><p>Đội bóng "FC Hưng Hà" được thành lập với mục tiêu đơn giản
                                    nhưng đầy ý nghĩa: tạo ra một sân chơi thể thao để mọi người trong khu vực có cơ hội
                                    rèn luyện sức khỏe, giao lưu, và gắn kết tình bạn. Đây là nơi các thành viên có thể
                                    cùng nhau tập luyện, vui chơi và chia sẻ niềm đam mê bóng đá.</p></div>
                        </div>
                        <div class="is-right"><img src="{{ asset('/images/hunghafc.jpg') }}"></div>
                    </div>
                </div>
            </div>
        </div>

        <section id="next-tournament" class="next-tournament-section bg-black ">
            <div class="next-tournament-wrap container">
                <div class="results">
                    <div class="wrapper-results">
                        <div class="box-results-tournament">
                            <div class="box-results-tournament-left">
                                <div class="logo-left">
                                    <div class="c-name"><span>19/11/2024 19:15</span>&nbsp;&nbsp;|&nbsp;&nbsp;<span>Sân bóng Đại Nam</span>
                                    </div>
                                </div>
                            </div>

                            <div class="box-results-tournament-right">
                                    <div class="c-left-team d-flex">
                                        <div class="c-name">Hưng Hà</div>
                                        <div class="c-img">
                                            <img src="{{asset('/images/logo-hungha.jpeg')}}" width="200px">
                                        </div>
                                    </div>
                                    <div class="c-name" style="padding: 20px; font-size: 30px"><span>- -</span></div>
                                    <div class="c-left-team d-flex">
                                        <div class="c-img"><img
                                                src="https://cms.hanoifc.net/images/cde56006-947f-4393-8403-a0c9a0fcb2d8.png" width="200px"></div>
                                        <div class="c-name">Hà Nội</div>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <div class="c-team-info-home">
            <div class="container">
                <div class="d-home-box">

                    <div class="is-title">
                        <h4 style="color:black;">Đội hình <i class='fas fa-angle-double-right'></i></h4>
                    </div>
                </div>
                <div id="carouselExample" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img class="d-block w-100" src="{{ asset('images/logo111.jpg') }}" alt="First Slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="{{ asset('images/logo222.jpg') }}" alt="Second Slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="{{ asset('images/hungha.jpg') }}" alt="Third Slide">
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExample" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExample" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="d-home-box">
                <div class="is-title" >
                    <h4 style="color:black;">Video <i class='fas fa-angle-double-right'></i></h4>
                    <a href="/doi-hinh">
                        <i class="bi bi-chevron-double-right"></i>
                    </a>
                </div>
            </div>
        </div>
        <section id="news" class="news-section ">
            <div class="">
                <div class="news-overview-wrap">
                    @foreach($videos as $video)
                    <div class="news-overview-item">
                        <div class="news-overview-image">
                            <a href="{{ $video->url }}">
                                <img src="{{asset($video->thumbnail)}}" alt="" class="img-responsive-hover b-error">
                            </a>
                        </div>

                        <div class="news-overview-text">
                            <h4 class="media-heading fw-400 fs-16px">
                                <a href="{{$video->url}}" target="_blank">
                                   {{$video->title}}  </a>
                            </h4>
                            <span class="fw-300 fs-12px text-gray" style="color: #fff; line-height: 1.5em; transition: .35s color ease-in-out;">
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
        <div class="partners-section-wrap">
            <div class="partners-section">
                <div class="partners-left" style="margin-bottom: 100px">

                </div>
            </div>
        </div>

    </div>
@endsection
