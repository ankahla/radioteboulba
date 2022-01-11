<div class="col-md-4">
    <!-- Categories Widget -->
    <!-- Side Widget -->
    <div class="card mb-4">
        <h4 class="card-header">أكثر الأخبار مشاهدة</h4>
        <div class="card-body">
        <?php  $hotNews = \App\News::where('status',1)->where('hot',true)->orderBy('created_at', 'DESC')->take(3)->get(); ?>
         @foreach ($hotNews as $news)
            <div class="r-posts">
                <div class="r-post-item">
                    <div class="r-post-image">
                        <a href="/news/{{ $news->created_at->format('Y/m/d')}}/{{$news->slug}}">
                        @php
                            $aFile = $news->media;

                            if(count($aFile))
                                $imgUrl = $aFile[0]->getUrl();
                            else
                                $imgUrl = Storage::url('/news/news-default.jpg');
                        @endphp
                          <img width="60"  src="{{$imgUrl}}" alt="">

                        </a>
                    </div>
                    <div class="r-post-content">
                        <a class="r-post-title" href="/news/{{ $news->created_at->format('Y/m/d')}}/{{$news->slug}}">{{$news->title}}

                            </a><br>
                         <div dir='RTL'> <span class="r-post-date"> {{ $news->created_at->format('d') }} {{\App\Helpers\ArabicDate::convertMonths($news->created_at->format('M')) }}</span>

                                </div><span >
                    </div>
                </div>
            </div>
        @endforeach
        </div>
    </div>

    <!-- Side Widget -->
    <div class="card my-4">
        <h4 class="card-header">آخر الأخبار</h4>
        <div class="card-body">


  <?php  $lastNews = \App\News::where('status',1)->orderBy('created_at', 'DESC')->take(5)->get(); ?>
       @foreach ($lastNews as $news)
          @php
              $aFile = $news->media;

              if(count($aFile))
                  $imgUrl = $aFile[0]->getUrl();
              else
                  $imgUrl = Storage::url('/news/news-default.jpg');
          @endphp
            <div class="r-posts">
                <div class="r-post-item">
                    <div class="r-post-image">
                        <a href="/news/{{ $news->created_at->format('Y/m/d')}}/{{$news->slug}}">
                          <img width="60"  src="{{$imgUrl}}" alt="">

                        </a>
                    </div>
                    <div class="r-post-content">
                        <a class="r-post-title" href="/news/{{ $news->created_at->format('Y/m/d')}}/{{$news->slug}}">{{$news->title}}

                            </a><br>
                         <div dir='RTL'> <span class="r-post-date"> {{ $news->created_at->format('d') }} {{\App\Helpers\ArabicDate::convertMonths($news->created_at->format('M')) }}</span>

                                </div><span >
                    </div>
                </div>
            </div>
        @endforeach

        </div>
    </div>
</div>
