<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta id="token" name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    @yield('fb-share-meta')
    <title>راديو طبلبة</title>
    <link rel="shortcut icon" type="image/png" href="{{ asset('img/icon.png') }}"/>
    <link rel="shortcut icon" type="image/png" href="{{ asset('img/icon.png') }}"/>

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css"
        integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="{{asset('vendor/bootstrap/css/bootstrap.css')}}" crossorigin="anonymous">
    <!-- Add icon library -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- owl.carousel Styles -->
    <link rel="stylesheet" href="{{ asset('owlcarousel/assets/owl.carousel.min.css') }} ">
    <link rel="stylesheet" href="{{ asset('owlcarousel/assets/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/sweet-alert2/css/sweetalert2.min.css') }}">
    <!-- jquery-3.3.1 -->
    <script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
    <!-- Custom styles for this template -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/blog-all.css') }}">
    <script data-ad-client="ca-pub-5895862045031222" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
    <style></style>
</head>

<body>
<div id="fb-root"></div>
    <script>(function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s); js.id = id;
            js.src = "https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.0";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));</script>

    <header class="fixed-top">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark ">
            <div class="container">
                <div class="navbar-logo logo-text navbar-brand">
                   <a href="/"><img class="img-logo" src="{{ asset('img/logo-white-radioteboulba.png') }}" alt="راديو طبلبة"></a>
                </div>

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
                    aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarResponsive">

                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="/contact-us"><span>اتصل بنا</span> </a>
                        </li>
                        <li class="nav-item sub-menu">
                            <a class="nav-link" href="#"><span>الأخبار</span></a>
                            <ul class="nav-submenu">
                                    <li><a href="/news">جميع الأصناف</a></li>
                                @foreach ( DB::table('news_categories')->where('status',1)->get() as $category)

                                <li><a href="/news/{{$category->slug}}">{{$category->name}}</a></li>
                                 {{-- bilel cache --}}
                                @endforeach

                            </ul>
                        </li>
                        <li class="nav-item sub-menu">
                            <a class="nav-link"><span>المقالات</span></a>
                            <ul class="nav-submenu">
                                <li><a href="/articles">جميع الأصناف</a></li>
                                @foreach ( DB::table('article_categories')->where('status',1)->get() as $category)

                                <li><a href="/articles/{{$category->slug}}">{{$category->name}}</a></li>
                                 {{-- bilel --}}

                                @endforeach



                            </ul>
                        </li>

                        <li class="nav-item active">
                            <a class="nav-link" href="{{route('radioTeboulba.home')}}"><span>الرئيسية</span>
                                <span class="sr-only">(current)</span>
                            </a>
                        </li>

                    </ul>

                </div>
            </div>
        </nav>
        {{-- <div class="nav-auth">
            <div class="nav-padding">
 --}}




        {{-- </div>
        </div> --}}
        <div class="user-nav">
            <div class="container">
                <ul class="social-nav model-1">
                    <li><a class="youtube" href="https://www.youtube.com/channel/UCmZn-yeI17r7DK9kSQu-cQA"><i class="fa fa-youtube"></i></a></li>
                    <li><a class="facebook" href="https://web.facebook.com/radioteboulbatnrt/"><i
                                class="fa fa-facebook"></i></a></li>
                    <li><a class="instagram" href="https://www.instagram.com/radio.teboulba/"><i class="fa fa-instagram"></i></a></li>
                </ul>
                <div class="live-radio">
                    <div class="cam">
                    </div>
                    <div class="radio">
                        <div class="live-meta">
                            <ul>
                                <li class="live-btn"> <a href="/live"><i class="fa fa-play" aria-hidden="true"></i> إستمـاع</a></li>
                                <li>صباحك يا طبلبة</li>
                                <li>من 08:00 إلي 10:00</li>
                            </ul>
                        </div>

                    </div>
                </div>
            </div>

        </div>
        <div class="progress-container hide">
            <div class="progress-bar" id="progressBar" style="width: 0%;"></div>
        </div>
    </header>
