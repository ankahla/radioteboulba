<!-- Navigation -->
@php
    $aFile = $newsPost->media;

    if(count($aFile))
        $imgUrl = $aFile[0]->getUrl();
    else
        $imgUrl = Storage::url('/news/news-default.jpg');
@endphp
@section('fb-share-meta')
    <meta property="og:url"           content="{{Request::url()}}" />
    <meta property="og:type"          content="website" />
    <meta property="og:title"         content="{{$newsPost->title}}" />
    <meta property="og:description"   content="{{$newsPost->title}}" />
    <meta property="og:image"         content="{{$imgUrl}}" />
@endsection

@include("radioteboulba.layouts.header")
<!-- Banner -->
<div class="header-section jarallax bg-cover-overlay"
    style="background-image: url('{{asset('img/default-articles-bg.jpg')}}')">
    <div class="container bg-cover-text">

        <div class="row">
            <div class="col-lg-6 col-sm-12">
                <h1 style="font-size:8w;"> {{$banner['title']}} </h1>
                <p style="font-size:2w;"> {{$banner['short_description']}} </p>
            </div>
            <div class="col-lg-6 col-sm-12">
                  <nav aria-label="breadcrumb pull-right  ">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/news">الأخبار</a></li>
                    <li class="breadcrumb-item"><a href="/news/{{$newsPost->category->slug}}">{{ ucfirst($newsPost->category->name) }}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ ucfirst($newsPost->title) }}</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<!-- Banner -->
<br>

<!-- Page Content -->
<div class="container">
    <div class="row">
        <div class="col-lg-8">
            <div class="single-post ">
                <!-- Title -->
                <h1 class="mt-4">{{$newsPost->title}}</h1>
                <!-- Date/Time -->
                <p class="date">  <div dir="rtl"> <span> {{ $newsPost->created_at->format('d') }} </span> {{\App\Helpers\ArabicDate::convertMonths($newsPost->created_at->format('M')) }}   {{ $newsPost->created_at->format('Y') }}     </div></p>
                <hr>
                <!-- Preview Image -->
                <img class="card-img-top " src="{{$imgUrl}}" alt="Card image cap">
                <hr>
                <!-- Post Content -->
                <p class="lead"> {{$newsPost->short_description}}</p>
                     <!-- Post Content -->
                <div dir="RTL" class="">{!! $newsPost->content!!}  </div>
                <hr>
                <div class="social-share text-right">
                    <div class="social-share fb-share-button"
                         data-size="large"
                         data-href="{{ Request::url() }}"
                         data-layout="button_count">
                    </div>
                </div>
            </div>
        </div>

        <!-- Sidebar Widgets Column -->
        @include('radioteboulba.news.news-side-widget')

    </div>
    <!-- /.row -->

</div>
<!-- /.container -->

<!--footer-->





@include("radioteboulba.layouts.footer")
