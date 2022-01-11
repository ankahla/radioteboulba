@include("radioTeboulba.layouts.header")


<section class="section title-bg-section overlay-bg-section-2 jarallax">
    <div class="container title-bg title-bg--primary">
        <h1>راديو طبلبة</h1>
        <span>ديما معاك</span>
        <div class="link-btn">
            <a href="/live">بث مباشر</a>
        </div>
    </div>
</section>

<section class="section ">
    <div class="container">
        <div class="row ">
            <!--breaking news-->
            <?php  $breakingNews = \App\News::where('status', 1)->where('hot', true)->orderBy('created_at', 'DESC')->take(3)->get();
            $index = 0;
            ?>
            @if(count($breakingNews) > 0)
                <div class="breaking-news">
                    <div class="breaking-box">
                        <div id="carouselbreaking" class="carousel slide" data-ride="carousel">

                            <div class="carousel-inner">


                            @foreach ($breakingNews as $news)
                                <!--list post-->
                                    <div class="carousel-item <?php  echo $index == 0 ? 'active' : '' ?>">
                                        <a class="text-white"
                                           href="/news/{{ $news->created_at->format('Y/m/d')}}/{{$news->slug}}">{{$news->short_description}}</a>
                                        <a href="/news/{{$news->category->slug}}"><span
                                                class="position-relative mx-2 badge badge-primary rounded-0">{{$news->category->name}}</span></a>

                                    </div>
                                    <?php $index++; ?>
                                @endforeach

                            </div>

                        </div>
                    </div>

                    <div class="breaking-title">
                        <strong>آخر الاخبار</strong>
                    </div>
                </div>
                <!--end breaking news-->
            @endif

            <?php  $hotNews = \App\News::where('status', 1)->where('hot', 1)->orderBy('created_at', 'DESC')->take(3)->get();
            ?>

            @if(count($hotNews) >= 3)
                @php
                    $aFile = $hotNews[0]->media;

                    if(count($aFile))
                        $imgUrl = $aFile[0]->getUrl();
                    else
                        $imgUrl = Storage::url('/news/news-default.jpg');
                @endphp
                <div class="col-md-8 hpost-left">
                    <div class="hpost post__img  post__img--lg" style="background-image: url({{$imgUrl}})">
                        <a class="hpost-link "
                           href="/news/{{  $hotNews[0]->created_at->format('Y/m/d')}}/{{$hotNews[0]->slug}}"></a>
                        <div class="hpost-body">
                            <div class="post-category">
                                <a class="cat-color-{{ $hotNews[0]->category->color}}"
                                   href="/news/{{$hotNews[0]->category->slug}}">{{$hotNews[0]->category->name}}
                                </a>
                            </div>
                            <h3 class="hpost-title"><a
                                    href="/news/{{ $hotNews[0]->created_at->format('Y/m/d')}}/{{$hotNews[0]->slug}}">{{$hotNews[0]->title}}</a>
                            </h3>
                            <ul class="hpost-meta">

                                <li dir="rtl"><span> {{ $hotNews[0]->created_at->format('d') }} </span>
                                    {{\App\Helpers\ArabicDate::convertMonths($hotNews[0]->created_at->format('M')) }}
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                @php
                    $aFile = $hotNews[1]->media;

                    if(count($aFile))
                        $imgUrl = $aFile[0]->getUrl();
                    else
                        $imgUrl = Storage::url('/news/news-default.jpg');
                @endphp
                <div class="col-md-4 hpost-right">
                    <div class="hpost post__img post__img--sm" style="background-image: url({{$imgUrl}})">

                        <a class="hpost-link"
                           href="/news/{{ $hotNews[1]->created_at->format('Y/m/d')}}/{{$hotNews[1]->slug}}"></a>
                        <div class="hpost-body">
                            <div class="post-category">
                                <a class="cat-color-{{ $hotNews[1]->category->color}}"
                                   href="/news/{{$hotNews[1]->category->slug}}">{{$hotNews[1]->category->name}}</a>
                            </div>
                            <h3 class="hpost-small-title"><a
                                    href="/news/{{ $hotNews[1]->created_at->format('Y/m/d')}}/{{$hotNews[1]->slug}}">{{$hotNews[1]->title}}</a>
                            </h3>
                            <ul class="hpost-meta">
                                <li dir="rtl"><span> {{ $hotNews[1]->created_at->format('d') }} </span>
                                    {{\App\Helpers\ArabicDate::convertMonths($hotNews[1]->created_at->format('M')) }}
                                </li>
                            </ul>
                        </div>
                    </div>

                    @php
                        $aFile = $hotNews[2]->media;

                        if(count($aFile))
                            $imgUrl = $aFile[0]->getUrl();
                        else
                            $imgUrl =  Storage::url('/news/news-default.jpg');
                    @endphp
                    <div class="hpost post__img post__img--sm" style="background-image: url({{$imgUrl}})">
                        <a class="hpost-link"
                           href="/news/{{ $hotNews[2]->created_at->format('Y/m/d')}}/{{$hotNews[2]->slug}}"></a>
                        <div class="hpost-body">
                            <div class="post-category">
                                <a class="cat-color-{{ $hotNews[2]->category->color}}"
                                   href="/news/{{ $hotNews[2]->category->slug}}">{{$hotNews[2]->category->name}}</a>
                            </div>
                            <h3 class="hpost-small-title"><a
                                    href="/news/{{ $hotNews[2]->created_at->format('Y/m/d')}}/{{$hotNews[2]->slug}}">{{$hotNews[2]->title}}</a>
                            </h3>
                            <ul class="hpost-meta">
                                <li dir="rtl"><span> {{ $hotNews[2]->created_at->format('d') }} </span>
                                    {{\App\Helpers\ArabicDate::convertMonths($hotNews[2]->created_at->format('M')) }}
                                </li>

                            </ul>
                        </div>
                    </div>

                </div>
            @endif

        </div>
    </div>
</section>
<?php  $radioPrograms = \App\RadioProgram::orderBy('created_at', 'DESC')->get() ?>
@if($radioPrograms->count() > 0)
<section class="section radios-schedule">

    <div class="container title-section-2">
        <h2>برامج الراديو </h2>
    </div>
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div id="owl2" class="js-owl owl-carousel owl-theme" data-autoplay="true" data-loop="false" data-nav="false"
                     data-dots="true" data-items="3" data-items-laptop="3" data-items-tab="2" data-items-mobile="1"
                     data-items-mobile-sm="1" data-margin="15" style="display:block">
                    <div class="owl-stage-outer">
                        <div class="owl-stage">

                            @foreach( $radioPrograms as $program)
                                @php
                                    $aFile = $program->media;

                                    if(count($aFile))
                                        $imgUrl = $aFile[0]->getUrl();
                                    else
                                        $imgUrl = Storage::url('radioprogram/default-thumb.jpg');
                                @endphp
                                <div class="owl-item">
                                    <div class="radio-schedule__item">
                                        <div class="radio-schedule__item__img">
                                            <img src="{{$imgUrl}}" alt="">
                                        </div>
                                        <div class="radio-schedule__item__content">
                                            <h3 class="radio-schedule__item__title">{{$program->title}}</h3>
                                            <div class="radio-schedule__item__time">
                                                {{$program->time}}
                                            </div>
                                            <div class="radio-schedule__item__description">
                                                {!! $program->description !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>
@endif


<?php  $lastArticles = \App\Article::where('status', 1)->orderBy('created_at', 'DESC')->take(3)->get(); ?>

@if(count($lastArticles) >= 3)

    <section class="section mb-4">
        <div class="container title-section">
            <h2>آخر المقالات</h2>
        </div>
        <div class="container">
            <div class="row mb-4">
                @foreach ($lastArticles as $article)
                    @php
                        $aFile = $article->media;

                        if(count($aFile))
                            $imgUrl = $aFile[0]->getUrl();
                        else
                            $imgUrl = Storage::url('articles/article-default.jpg');
                    @endphp

                    <div class="col-md-4 ">
                        <div class="small-post article-post">
                            <div class="article-preview-img">
                                <a style="background-image: url('{{$imgUrl}}')" class="small-post-img" href="/articles/{{ $article->category->slug}}/{{$article->slug}}"></a>
                                {{--<img src="{{$imgUrl}}" alt="">--}}
                                <div class="article-preview-meta">
                                    <div class="post-category">
                                        <a class="cat-color-{{ $article->category->color}}"
                                           href="/articles/{{ $article->category->slug}}">{{$article->category->name}}</a>
                                    </div>
                                </div>
                            </div>
                            <div class="small-post-body">
                                <div class="post-meta mt-2">
                                    <span class="date meta-item">
                                        <div dir='RTL'> <span> {{ $article->created_at->format('d') }}</span>
                                            {{\App\Helpers\ArabicDate::convertMonths($article->created_at->format('M')) }}
                                        </div>
                                    </span>
                                    <div class="clearfix"></div>
                                </div>
                                <a href="/articles/{{ $article->category->slug}}/{{$article->slug}}">
                                    <h4 class="samll-post-title small-post-title--black">{{$article->title}}</h4>
                                </a>
                            </div>
                        </div>
                    </div>

                @endforeach


            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="link-btn">
                        <a href="/articles">كل المقالات</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endif

<?php  $lastFanMessages = \App\FansMessage::all();
$lastFanMessagesCount = count($lastFanMessages);
?>
@if( $lastFanMessagesCount > 0)

    <section class="section recent-topics-bg overlay-bg-section jarallax">

        <div class="container title-section-2">
            <h2>رسائل المتابعين</h2>
        </div>


        <div class="container mt-5">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div id="owl" class="js-owl owl-carousel owl-theme" data-autoplay="true" data-loop="false" data-nav="false"
                         data-dots="true" data-items="3" data-items-laptop="3" data-items-tab="2" data-items-mobile="1"
                         data-items-mobile-sm="1" data-margin="15" style="display:block">
                        <div class="owl-stage-outer">
                            <div class="owl-stage">


                                @foreach ($lastFanMessages as $fanMessage)


                                    <div class="owl-item">
                                        <div class="topic">
                                            <div class="topic-info">

                                                <p>{!! $fanMessage->content !!}
                                                </p>
                                            </div>
                                            <a class="user-public-link" href="">


                                                <div class="topic-publisher">
                                                    {{--                                            <div class="user-avatar">
                                                                                                    <img src="http://127.0.0.1:8000/img/user-pic.jpg" alt="">
                                                                                                </div>--}}
                                                    <div class="user-info">
                                                        <h5>{{$fanMessage->title}}</h5>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>

                                @endforeach


                            </div>
                        </div>


                    </div>
                </div>

            </div>
        </div>

    </section>

@endif

<section class="section mb-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12 mb-3">
                <?php  $randomSingleNews = \App\News::where('status', 1)->orderBy('created_at', 'DESC')->first(); ?>
                <div class="row trending-news">
                    <div class="container title-section-md mb-5">
                        <h3>الأخبار</h3>
                        <div class="news-cats">
                            <?php  $newsCategories = \App\NewsCategory::where('status', 1)->orderBy('created_at', 'DESC')->get(); ?>

                        @foreach ($newsCategories as $category)
                                <div class=" mb-3 side-cat ">
                                    <div class="post-category">
                                        <a class="cat-color-{{$category->color }}" href="/news/{{ $category->slug}}">{{$category->name}}</a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="col-sm-6">
                        @php
                            $aFile = $randomSingleNews->media;

                            if(count($aFile))
                                $imgUrl = $aFile[0]->getUrl();
                            else
                                $imgUrl = Storage::url('news/news-default.jpg');
                        @endphp
                        <img src="{{$imgUrl}}" alt="">
                        <div class="post-meta mt-2">

                            <span class="date meta-item">
                                <div dir='RTL'> <span> {{ $randomSingleNews->created_at->format('d') }}</span>
                                    {{\App\Helpers\ArabicDate::convertMonths($randomSingleNews->created_at->format('M')) }}
                                </div>
                            </span>

                            <div class="clearfix"></div>
                        </div>
                        <h4 class="title"><a
                                href="/news/{{ $randomSingleNews->created_at->format('Y/m/d')}}/{{$randomSingleNews->slug}}"><b>{{$randomSingleNews->title}}
                                </b></a></h4>

                        <p>{{$randomSingleNews->short_description}}</p>
                    </div>
                    <div class="col-sm-6 ">

                        <?php  $randomNews = \App\News::where('status', 1)->orderBy('created_at', 'DESC')->take(3)->get(); ?>
                        @foreach ($randomNews as $news)
                                @php
                                    $aFile = $news->media;

                                    if(count($aFile))
                                        $imgUrl = $aFile[0]->getUrl();
                                    else
                                        $imgUrl = Storage::url('news/news-default.jpg');
                                @endphp
                                <div class="trending-small-img">
                                    <a class="trending-small-item" href="/news/{{ $news->created_at->format('Y/m/d')}}/{{$news->slug}}">
                                    <img src="{{$imgUrl}}" alt="">
                                    </a>
                                </div>
                                <div class="trending-small-details">
                                    <a href="/news/{{ $news->created_at->format('Y/m/d')}}/{{$news->slug}}">
                                        <h5 class="title"><b>{{$news->title}} </b></h5>
                                    </a>
                                    <span class="date meta-item">
                                        <div dir='RTL'> <span> {{ $randomSingleNews->created_at->format('d') }}</span>
                                            {{\App\Helpers\ArabicDate::convertMonths($randomSingleNews->created_at->format('M')) }}
                                        </div>
                                    </span>
                                </div>
                            <br>
                        @endforeach

                    </div>

                    <div class="link-btn   m-auto mt-5 ">
                        <br><br>
                        <a  class="mb-3" href="/news">كل الأخبار</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@include("radioTeboulba.layouts.footer")
