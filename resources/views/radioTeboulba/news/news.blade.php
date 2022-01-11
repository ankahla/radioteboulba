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
                        <li class="breadcrumb-item"><a  href="/news">الأخبار</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ ucfirst($banner['title']) }}</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<!-- Banner -->

<div class="container mt-100">
<section class="section mb-4">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
             @foreach ($news as $newsPost)
                    @php
                        $aFile = $newsPost->media;

                        if(count($aFile))
                            $imgUrl = $aFile[0]->getUrl();
                        else
                            $imgUrl = Storage::url('/news/news-default.jpg');
                    @endphp
                    <div class="rnews-post">
                        <a href="#" class="rnews-img">
                            <img class="img-fluid" src="{{$imgUrl}}" alt="#">
                        </a>
                        <div class="rnews-body">
                            <div class="rnews-meta">
                                <div class="post-category">
                                   <a  class="cat-color-{{$newsPost->category->color }}" href="/news/{{  DB::table('news_categories')->where('id',$newsPost->category_id)->value('slug')}}">{{  DB::table('news_categories')->where('id',$newsPost->category_id)->value('name')}}</a>
                                </div>
                            </div>
                            <a class="rnews-title" href="/news/{{ $newsPost->created_at->format('Y/m/d')}}/{{$newsPost->slug}}" >{{ $newsPost->title }}</a>
                            <ul class="post-info">
                                <li class="date" dir="rtl">   <span> {{ $newsPost->created_at->format('d') }} {{\App\Helpers\ArabicDate::convertMonths($newsPost->created_at->format('M')) }}   {{ $newsPost->created_at->format('Y') }} </span>  </li>
                            </ul>
                            <p>
                                {{ $newsPost->short_description }}
                            </p>

                        </div>
                    </div>
                @endforeach

                <div class="mt-5 mb-5">
                    {{ $news->links() }}
                </div>

            </div>
               <!-- Sidebar Widgets Column -->
        @include('radioteboulba.news.news-side-widget')

        </div>
    </div>
</section>


</div>

@include("radioteboulba.layouts.footer")
