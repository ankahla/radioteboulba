<div class="col-lg-4">

    <div class="card mb-4">
            <h4 class="card-header">الأصناف</h4>
            <div class="card-body">

<?php  $articleCategories = \App\ArticleCategory::where('status',1)->orderBy('created_at', 'DESC')->get(); ?>
       @foreach ($articleCategories as $category)
                <div class=" mb-3 side-cat ">
                    <div class="post-category">
                        <a class="cat-color-{{$category->color }}" href="/articles/{{ $category->slug}}">{{$category->name}}</a>
                    </div>
                </div>
        @endforeach

            </div>
        </div>
        <div class="card my-4">
            <h4 class="card-header">آخر المقالات</h4>
            <div class="card-body">

<?php  $lastArticles = \App\Article::where('status',1)->orderBy('created_at', 'DESC')->take(5)->get(); ?>
          @foreach ($lastArticles as $article)
            @php
                $aFile = $article->media;

                if(count($aFile))
                    $imgUrl = $aFile[0]->getUrl();
                else
                    $imgUrl = Storage::url('/articles/article-default.jpg');
            @endphp
            <div class="r-posts">
                <div class="r-post-item">
                    <div class="r-post-image">
                        <a href="/articles/{{ $article->category->slug}}/{{$article->slug}}">
                          <img width="60"  src="{{$imgUrl}}" alt="">

                        </a>
                    </div>
                    <div class="r-post-content">
                        <a class="r-post-title"href="/articles/{{ $article->category->slug}}/{{$article->slug}}">{{$article->title}}

                            </a><br>
                         <div dir='RTL'> <span class="r-post-date"> {{ $article->created_at->format('d') }} {{\App\Helpers\ArabicDate::convertMonths($article->created_at->format('M')) }}</span>

                                </div><span >
                    </div>
                </div>
            </div>
        @endforeach
            </div>
        </div>
</div>
