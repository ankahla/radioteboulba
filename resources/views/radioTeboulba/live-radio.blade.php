<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/png" href="{{ secure_asset('img/icon.png') }}"/>
    <link rel="shortcut icon" type="image/png" href="{{ secure_asset('img/icon.png') }}"/>

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css"
        integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="{{secure_asset('vendor/bootstrap/css/bootstrap.css')}}" crossorigin="anonymous">
    <!-- Custom styles for this template -->
    <link rel="stylesheet" type="text/css" href="{{ secure_asset('css/blog-all.css') }}">

    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>راديو طبلبة بث مباشر</title>
    <style>
        html, 
        body, .bg-img-rd {
            height: 100%;
        }
    </style>
</head>
<body>
    <div class="bg-img-rd">
        <div class="container">
            <div class="row mb-5">
                <h1 class="m-auto ">راديو طبلبة بث مباشر</h1>
            </div>
            <div class="row">
                <img class="m-auto" src="{{ secure_asset('img/logo-radioteboulba.png') }}" alt="">           

            </div>
            <div class="row  mt-5 mb-5">
                <div class="player m-auto">
                <audio controls autoplay="autoplay"><source src="http://130.185.144.199:11545/;stream.mp3" type="audio/mp3">Your browser does not support the audio element.</audio>
                </div>
            </div>
            <div class="row mt-5">
                <h5 class="m-auto text-center"> تسمعون إلى البث المباشر لراديو طبلبة من خلال هذه الصفحة بصفة مؤقتة إلى ان يكتمل العمل على الموقع في الأيام القادم إن شاء الله</h5>
            </div>
        </div>
    </div>
</body>
</html>