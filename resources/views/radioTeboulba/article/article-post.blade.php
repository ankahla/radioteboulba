<!-- Header -->
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
                        <li class="breadcrumb-item"><a href="/articles">المقالات</a></li>
                    <li class="breadcrumb-item"><a href="/articles/{{$article->category->slug}}">{{ ucfirst($article->category->name) }}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ ucfirst($article->title) }}</li>
                    </ol>
                </nav>
            </div>
        </div>


    </div>
</div>

<!-- Page Content -->
<div class="container  mt-5">
    <div class="row">
        <div class="col-lg-8">
            <div class=" single-post">
                <!-- Title -->
                <h1 class="mt-4">{{$article->title}}</h1>
                <p class="date" dir="rtl">   <span> {{ $article->created_at->format('d') }} </span> {{\App\Helpers\ArabicDate::convertMonths($article->created_at->format('M')) }}   {{ $article->created_at->format('Y') }}  </p>
                <p class="description">
                    {{$article->short_description}}</p>

                <hr>
                <!-- Preview Image -->
                @php
                    $aFile = $article->media;

                    if(count($aFile))
                        $imgUrl = $aFile[0]->getUrl();
                    else
                        $imgUrl = Storage::url('/articles/article-default.jpg');
                @endphp

                <img class="card-img-top rounded" src="{{ $imgUrl }}" alt="Card image cap">
                <hr>
                <br>
                <!-- Post Content -->
                <div dir="RTL" class="">{!! $article->content !!}  </div>
                <div class="social-share">
                    <div class="social-share fb-share-button"
                         data-href="{{ Route::current() }}"
                         data-layout="button_count">
                    </div>
                </div>
            </div>

        </div>

        <!-- Sidebar Widgets Column -->
        @include('radioteboulba.article.articles-side-widget')

    </div>
    <!-- /.row -->

</div>
<!-- Page Content -->
<br>
<!--footer-->
@include("radioteboulba.layouts.footer")


