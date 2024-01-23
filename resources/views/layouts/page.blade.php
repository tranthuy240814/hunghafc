<html lang="en" class="js flexbox flexboxlegacy canvas canvastext webgl no-touch geolocation postmessage no-websqldatabase indexeddb hashchange history draganddrop websockets rgba hsla multiplebgs backgroundsize borderimage borderradius boxshadow textshadow opacity cssanimations csscolumns cssgradients cssreflections csstransforms csstransforms3d csstransitions fontface generatedcontent video audio localstorage sessionstorage webworkers no-applicationcache svg inlinesvg smil svgclippaths">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-compatible" content="IE=edge">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#ffffff">

    <meta name="msapplication-TileColor" content="#E45357">
    <meta name="msapplication-TileImage" content="{{ asset('/assets/images/favicons/favicon-144.png') }}">
    <meta name="application-name" content="{{ env('APP_NAME', 'Badminton.io') }}">
    <meta name="msapplication-tooltip" content="{{ env('APP_NAME', 'Badminton.io') }}">
    <meta name="description" content="{{ __('Run your badminton league for free, badminton scheduling and online results and statistics displayed on your free website.') }}">
    <meta name="keywords" content="{{ __('badminton scheduling,badminton scheduler,badminton league,badminton league website,manage badminton league online,run badminton league online') }}">
    <meta name="robots" content="Index, Follow">

    <title>@yield('title')</title>

    <link rel="canonical" href="https://badminton.io">
    <link rel="alternate" hreflang="en-US" href="https://badminton.io">
    <link rel="alternate" hreflang="af" href="https://badminton.io">
    <link rel="alternate" hreflang="x-default" href="https://badminton.io">
    <link rel="icon" type="image/x-icon" href="{{ asset('/images/logo-no-background.png') }}">

    <link rel="stylesheet" href="{{ asset('/plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/page/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/content/league.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/page/homepage.css') }}" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    @yield('css')
</head>

<body>
    <header style="background-color: #222">
        <div class="top-nav">
            <ul class="container">
                <li class="menu">
                    <span>en</span>
                    <ul>
                        <li>
                            <a class="{{ Session::get('locale') == 'en' ? 'active' : ''}}" href="{{ route('app.setLocale', ['locale' => 'en']) }}">
                                {{ __('English') }}
                            </a>
                        </li>

                        <li>
                            <a class="{{ Session::get('locale') == 'vi' ? 'active' : ''}}" href="{{ route('app.setLocale', ['locale' => 'vi']) }}">
                                {{ __('Vietnamese') }}
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
        <nav class="container">
            <a href="{{ route('home') }}"><img style="margin-bottom: 30px" class="left" src="{{ asset('/images/logo-no-background.png') }}" alt="{{ env('APP_NAME', 'Badminton.io') }}" width="100" height="100"></a>

            <ul id="menu" class="menu-main">
                <li class="pt-2"><a href="{{ route('list.league') }}">{{ __('League') }}</a></li>
                <li class="pt-2"><a href="{{ route('list.group') }}">{{ __('Group') }}</a></li>
                <li class="pt-2"><a href="{{ route('ranking') }}">{{ __('Ranking') }}</a></li>
                <li id="search">
                    <form id="search-league" action="{{ route('search') }}" method="post">
                        @csrf
                        <div onclick="openSearch()">
                            <input type="search" name="search" placeholder="{{ __('Search leagues') }}...">
                            <button type="button">
                                <img src="{{ asset('/svg/icon-search.svg') }}" alt="{{ __('Search') }}" title="{{ __('Search') }}" width="15" height="15">
                            </button>
                        </div>
                    </form>
                </li>
                <div class="nav-group">
                    @if(Auth::check())
                    <li class="menu">
                        <span>
                            @if (strpos(Auth::user()->profile_photo_path, 'http') > 0)
                            <img class="avatar-user" width="40" height="40" src="{{ Auth::user()->profile_photo_path ?? asset('/images/no-image.png') }}">
                            @else
                            <img class="avatar-user" width="40" height="40" src="{{ asset( Auth::user()->profile_photo_path ?? '/images/no-image.png') }}">
                            @endif
                        </span>
                        <ul class="submenu">
                            <li>
                                <a class="account" href="{{ route('profile.edit') }}">
                                    {{ __('Profile') }}
                                </a>
                            </li>

                            <li>
                                <a class="account" href="{{ route('my.group') }}">
                                    {{ __('My group') }}
                                </a>
                            </li>
                            <li><a class="dropdown-item account" href="{{ route('signout') }}"><i class="fas fa-sign-out-alt mr-2 "></i>{{ __('Log out') }}</a></li>
                        </ul>
                    </li>

                    @else
                    <li><a href="{{ route('login') }}" class="button white " style="height: 45px;">{{ __('Log In') }}</a></li>
                    <li><a href="{{ route('register_user') }}" class="button" style="height: 45px;">{{ __('Register') }}</a></li>
                    @endif

                    @if(Auth::check())
                    @php
                    $count = 0;
                    $listNotification = Cache::get('notification_next_match_' . Auth::user()->id);
                    foreach($listNotification as $notification) {
                    if($notification->status == 0) {
                    $count++;
                    }
                    }
                    @endphp
                    <li class="li-notification">
                        <a class="notification" id="notification">
                            <i class="fas fa-bell"></i>
                            <span class="badge">{{ $count }}</span>
                        </a>
                        @if(count($listNotification) > 0)
                        <ul class="dropdown-notification" id="dropdown-notification">
                            @foreach($listNotification as $notification)
                            @if($notification->status == 0)
                            <li class="noti-unread"><a>{{ $notification->content }}</a></li>
                            @else
                            <li><a>{{ $notification->content }}</a></li>
                            @endif
                            @endforeach
                        </ul>
                        @else
                        <ul class="dropdown-notification" id="dropdown-notification">
                            <li><a>{{ __('Empty Notification') }}</a></li>
                        </ul>
                        @endif
                    </li>
                </div>
                @endif

            </ul>
            <div class="open-btn">
                <span class="line"></span>
                <span class="line"></span>
                <span class="line"></span>
            </div>
        </nav>
    </header>

    @yield('content')
{{--    <div class="" style="background: black">--}}
{{--        <footer class="py-5 container" >--}}
{{--            <div class="row">--}}
{{--                <div class="col-6 col-md-3 mb-3">--}}
{{--                    <h4 class="h3 color-white">{{ __('Criteria') }}</h4>--}}
{{--                    <ul class="nav flex-column color-white" >--}}
{{--                        <p>{{ __('Efficiency and ease-of-use are our mission, simplifying the process of running a sports league.') }}</p>--}}
{{--                        <p>{{ env('APP_NAME', 'Badminton.io') }} {{ __('is available to all at no cost. Additionally, we offer premium plans that include additional functionality.') }}</p>--}}
{{--                    </ul>--}}
{{--                </div>--}}

{{--                <div class="col-6 col-md-3 mb-3">--}}
{{--                    <h4 class="h3 color-white">{{ __('Company') }}</h4>--}}

{{--                    <ul class="nav flex-column">--}}
{{--                        <li><a href="{{ route('about') }}">{{ __('About') }}</a></li>--}}
{{--                    </ul>--}}
{{--                </div>--}}

{{--                <div class="col-6 col-md-3 mb-3">--}}
{{--                    <h4 class="h3 color-white">{{ __('Features') }}</h4>--}}
{{--                    <ul class="nav flex-column">--}}
{{--                        <li><a href="{{ route('list.league') }}">{{ __('League') }}</a></li>--}}
{{--                        <li><a href="">{{ __('Shop') }}</a></li>--}}
{{--                        <li><a href="{{ route('list.group') }}">{{ __('Group') }}</a></li>--}}
{{--                    </ul>--}}
{{--                </div>--}}

{{--                <div class="col-md-3 ">--}}
{{--                    <form>--}}
{{--                        <h4 class="h3 color-white">{{ env('APP_NAME', 'Badminton.io') }}</h4>--}}
{{--                        <p>--}}
{{--                            <small>--}}
{{--                                <a href="{{ route('term.and.conditions') }}">{{ __('Terms & Conditions') }}</a>,--}}
{{--                                <a href="{{ route('privacy') }}">{{ __('Privacy') }}</a>--}}
{{--                                <br>--}}
{{--                                <span class="color-white">{{ __('Copyright© 2023') }}</span> <a href="{{ route('home')}}">{{ env('APP_NAME', 'Badminton.io') }}</a>--}}
{{--                            </small>--}}
{{--                        </p>--}}
{{--                        <ul class="social">--}}
{{--                            <li><a href=""><img src="{{ asset('/svg/icon-linkedin.svg') }}" alt="{{ __('LinkedIn') }}" width="30" height="31"></a></li>--}}
{{--                            <li><a href=""><img src="{{ asset('/svg/icon-twitter.svg') }}" alt="{{ __('Twitter') }}" width="30" height="31"></a></li>--}}
{{--                            <li><a href=""><img src="{{ asset('/svg/icon-facebook.svg') }}" alt="{{ __('Facebook') }}" width="30" height="31"></a></li>--}}
{{--                            <li><a href=""><img src="{{ asset('/svg/icon-youtube.svg') }}" alt="{{ __('YouTube') }}" width="30" height="31"></a></li>--}}
{{--                        </ul>--}}
{{--                    </form>--}}
{{--                </div>--}}
{{--            </div>--}}

{{--        </footer>--}}
{{--    </div>--}}
    <div class="" style="background: black">
        <footer class="container py-5">
            <div class="row">
                <div class="color-white col-md-3 mb-3">
                    <h4>{{ __('Criteria') }}</h4>
                    <ul class="nav flex-column">
                        <p>{{ __('Efficiency and ease-of-use are our mission, simplifying the process of running a sports league.') }}</p>
                        <p>{{ env('APP_NAME', 'Badminton.io') }} {{ __('is available to all at no cost. Additionally, we offer premium plans that include additional functionality.') }}</p>
                    </ul>
                </div>

                <div class="col-md-3 mb-3 color-white">
                    <h4>{{ __('About') }}</h4>
                    <ul class="nav flex-column">
                        <li><a href="{{ route('about') }}">{{ __('About') }}</a></li>
                    </ul>
                </div>

                <div class="col-md-3 mb-3">
                    <h4 class="color-white">{{ __('Features') }}</h4>
                    <ul class="nav flex-column">
                        <li><a href="{{ route('list.league') }}">{{ __('League') }}</a></li>
                        <li><a href="">{{ __('Shop') }}</a></li>
                        <li><a href="{{ route('list.group') }}">{{ __('Group') }}</a></li>
                    </ul>
                </div>
                <div class="col-md-3 ">
                    <form>
                        <h4 class="h3 color-white">{{ env('APP_NAME', 'Badminton.io') }}</h4>
                        <p>
                            <small>
                                <a href="{{ route('term.and.conditions') }}">{{ __('Terms & Conditions') }}</a>,
                                <a href="{{ route('privacy') }}">{{ __('Privacy') }}</a>
                                <br>
                                <span class="color-white">{{ __('Copyright© 2023') }}</span> <a href="{{ route('home')}}">{{ env('APP_NAME', 'Badminton.io') }}</a>
                            </small>
                        </p>
                        <ul class="social">
                            <li><a href=""><img src="{{ asset('/svg/icon-linkedin.svg') }}" alt="{{ __('LinkedIn') }}" width="30" height="31"></a></li>
                            <li><a href=""><img src="{{ asset('/svg/icon-twitter.svg') }}" alt="{{ __('Twitter') }}" width="30" height="31"></a></li>
                            <li><a href=""><img src="{{ asset('/svg/icon-facebook.svg') }}" alt="{{ __('Facebook') }}" width="30" height="31"></a></li>
                            <li><a href=""><img src="{{ asset('/svg/icon-youtube.svg') }}" alt="{{ __('YouTube') }}" width="30" height="31"></a></li>
                        </ul>
                    </form>
                </div>
            </div>

            <div class="d-flex flex-column flex-sm-row justify-content-between py-4 my-4 border-top color-white">
                <p>{{__('© 2022 Company, Inc. All rights reserved.')}}</p>
                <ul class="list-unstyled d-flex">
                    <li class="ms-3"><a class="link-dark" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#twitter"></use></svg></a></li>
                    <li class="ms-3"><a class="link-dark" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#instagram"></use></svg></a></li>
                    <li class="ms-3"><a class="link-dark" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#facebook"></use></svg></a></li>
                </ul>
            </div>
        </footer>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/selectivizr/1.0.2/selectivizr-min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="{{ asset('/js/page/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('/js/page/common.min.js') }}"></script>
    <script>
        $('.open-btn').click(function() {
            $('nav.container').toggleClass('active');
        })
    </script>

    @yield('js')
</body>

</html>
