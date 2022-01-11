<!-- Header -->
@include("radioTeboulba.layouts.header")

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
                        <li class="breadcrumb-item"><a  href="/articles">المقالات</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ ucfirst($banner['title']) }}</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<!-- Banner -->


<!-- Page Content -->
<div class="container mt-5">
    <div class="row">
        <div class="col-md-8">
            <!-- Articles list -->
            @foreach ($articles as $article)
            @php
                $aFile = $article->media;

                if(count($aFile))
                    $imgUrl = $aFile[0]->getUrl();
                else
                    $imgUrl = Storage::url('/articles/article-default.jpg');
            @endphp
            <div class="card cardarticle all-articles-item mb-4">
                <div class="iq-entry-image clearfix">

                    <img class="img-fluid" src="{{$imgUrl}}" alt="#">
                    <span
                        class="date ">{{ $article->created_at->format('d') }}<small> {{\App\Helpers\ArabicDate::convertMonths($article->created_at->format('M')) }}</small></span>
                </div>
                <div class="card-body">
                        <div class="post-category">
                                <a class="cat-color-{{$article->category->color }}" href="/articles/{{$article->category->slug }}">{{  $article->category->name }}</a>
                            </div>
                    <a href="/articles/{{$article->category->slug }}/{{$article->slug}}"  class="article-title">{{$article->title}}</a>

                        <ul class="post-info">
                            <li class="date" dir="rtl">   <span> {{ $article->created_at->format('d') }} {{\App\Helpers\ArabicDate::convertMonths($article->created_at->format('M')) }}   {{ $article->created_at->format('Y') }} </span>  </li>
                        </ul>
                    <p class="card-text">{{$article->short_description}}</p>
                    <a href="/articles/{{$article->category->slug }}/{{$article->slug}}"
                        class="btn btn-primary">اقرأ المزيد</a>
                    <hr>

                </div>


            </div>

            @endforeach

            <div class="mt-5 mb-5">
                {{ $articles->links() }}

            </div>
        </div>
        <!-- Sidebar Widgets -->
        @include('radioTeboulba.article.articles-side-widget')

    </div>


</div>
<!--  Page Content -->

<!--footer-->
@include("radioTeboulba.layouts.footer")
