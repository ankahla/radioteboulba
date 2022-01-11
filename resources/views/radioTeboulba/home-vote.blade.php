@include("layouts.header")


<section class="section title-bg-section overlay-bg-section jarallax">
    <div class="container title-bg">
        <h1>راديو طبلبة</h1>
        <span>ديما معاك</span>
        <div class="link-btn">
            <a href="/register">بث مباشر</a>
        </div>
    </div>

</section>

<section class="section ">
    <div class="container">
        <div class="row ">

 <!--breaking news-->
 <?php  $breakingNews = \App\News::where('status','PUBLISHED')->where('hot',true)->orderBy('created_at', 'DESC')->take(3)->get();
                      $index=0;
                    ?>
             @if(count($breakingNews) > 0)
            <div class="breaking-news">
                <div class="breaking-box">
                    <div id="carouselbreaking" class="carousel slide" data-ride="carousel">
                       
                        <div class="carousel-inner">
                           
                    
                    @foreach ($breakingNews  as $news)
                            <!--list post-->
                            <div class="carousel-item <?php  echo $index==0 ? 'active' : '' ?>">
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


   <?php  $hotArticles = \App\Article::where('status','PUBLISHED')->where('hot',true)->orderBy('created_at', 'DESC')->take(3)->get();
      ?>

@if(count($hotArticles) >= 3)
            <div class="col-md-8 hpost-left">
                <div class="hpost">
                    <a class="hpost-link"  href="/articles/{{ $hotArticles[0]->category->slug}}/{{$hotArticles[0]->slug}}" > <img src="{{Storage::url($hotArticles[0]->media_link)}}" alt=""></a>
                    <div class="hpost-body">
                        <div class="post-category">
                            <a class="cat-color-{{ $hotArticles[0]->category->color}}"  href="/articles/{{ $hotArticles[0]->category->slug}}/{{$hotArticles[0]->slug}}">{{$hotArticles[0]->category->name}} </a>
                        </div>
                    <h3 class="hpost-title"><a  href="/articles/{{ $hotArticles[0]->category->slug}}/{{$hotArticles[0]->slug}}">{{$hotArticles[0]->title}}</a></h3>
                        <ul class="hpost-meta">
                         
                            <li dir="rtl"> <span> {{ $hotArticles[0]->created_at->format('d') }} </span> {{\App\Helpers\ArabicDate::convertMonths($hotArticles[0]->created_at->format('M')) }}      </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-4 hpost-right">
                <div class="hpost">
                 
                <a class="hpost-link" href="/articles/{{ $hotArticles[1]->category->slug}}/{{$hotArticles[1]->slug}}"> <img src="{{Storage::url($hotArticles[1]->media_link)}}" alt=""></a>
                    <div class="hpost-body">
                        <div class="post-category">
                            <a class="cat-color-{{ $hotArticles[1]->category->color}}"href="/articles/{{ $hotArticles[1]->category->slug}}/{{$hotArticles[1]->slug}}">{{$hotArticles[1]->category->name}}</a>
                        </div>
                        <h3 class="hpost-small-title"><a href="/articles/{{ $hotArticles[1]->category->slug}}/{{$hotArticles[1]->slug}}">{{$hotArticles[1]->title}}</a></h3>
                        <ul class="hpost-meta">
                            <li dir="rtl"> <span> {{ $hotArticles[1]->created_at->format('d') }} </span> {{\App\Helpers\ArabicDate::convertMonths($hotArticles[1]->created_at->format('M')) }}      </li>
                        </ul>
                    </div>
                </div>
                <div class="hpost">
                    <a class="hpost-link" href="/articles/{{ $hotArticles[2]->category->slug}}/{{$hotArticles[2]->slug}}"> <img src="{{Storage::url($hotArticles[2]->media_link)}}" alt=""></a>
                    <div class="hpost-body">
                        <div class="post-category">
                            <a class="cat-color-{{ $hotArticles[2]->category->color}}" href="/articles/{{ $hotArticles[2]->category->slug}}">{{$hotArticles[2]->category->name}}</a>
                        </div>
                        <h3 class="hpost-small-title"><a href="/articles/{{ $hotArticles[2]->category->slug}}/{{$hotArticles[2]->slug}}">{{$hotArticles[2]->title}}</a></h3>
                        <ul class="hpost-meta">
                            <li dir="rtl"> <span> {{ $hotArticles[2]->created_at->format('d') }} </span> {{\App\Helpers\ArabicDate::convertMonths($hotArticles[2]->created_at->format('M')) }}      </li>
                            
                        </ul>
                    </div>
                </div>

            </div>
@endif

        </div>
    </div>
</section>




  
<?php  $lastArticles = \App\Article::where('status','PUBLISHED')->orderBy('created_at', 'DESC')->take(3)->get(); ?> 

@if(count($lastArticles) >= 3)
<section class="section mb-4">
    <div class="container title-section">
            <h2>آخر المقالات</h2>
        </div>
    <div class="container">
        <div class="row">

            <div class="col-md-4 ">
                <div class="small-post article-post">
                    <a class="small-post-img"  href="/articles/{{ $lastArticles[0]->category->slug}}/{{$lastArticles[0]->slug}}">
                        <div class="article-preview-img">
                            <img src="{{Storage::url($lastArticles[0]->media_link)}}" alt="">
                            <div class="article-preview-meta">
                                
                                <div class="post-category">
                                    <a class="cat-color-{{ $lastArticles[0]->category->color}}"  href="/articles/{{ $lastArticles[0]->category->slug}}">{{$lastArticles[0]->category->name}}</a>
                                </div>
                            </div>
                        </div>
                    </a>

                    <div class="small-post-body">
                        <div class="post-meta mt-2">
                            </span>
                            <span class="date meta-item">
                              
                               <div>  <span> {{ $lastArticles[0]->created_at->format('d') }}</span> {{\App\Helpers\ArabicDate::convertMonths($lastArticles[0]->created_at->format('M')) }}      </div>
                            </span>

                            <div class="clearfix"></div>
                        </div>
                        <h4 class="samll-post-title"><a href="/articles/{{ $lastArticles[0]->category->slug}}/{{$lastArticles[0]->slug}}"> {{$lastArticles[0]->title}}</a></h3>
                    </div>
                </div>
            </div>
            <div class="col-md-4 ">
                <div class="small-post article-post">
                    <a class="small-post-img"  href="/articles/{{ $lastArticles[1]->category->slug}}/{{$lastArticles[1]->slug}}">
                        <div class="article-preview-img">
                            <img src="{{Storage::url($lastArticles[1]->media_link)}}" alt="">
                            <div class="article-preview-meta">
                                
                                <div class="post-category">
                                    <a class="cat-color-{{ $lastArticles[1]->category->color}}""  href="/articles/{{ $lastArticles[1]->category->slug}}">{{$lastArticles[1]->category->name}}</a>
                                </div>
                            </div>
                        </div>
                    </a>

                    <div class="small-post-body">
                        <div class="post-meta mt-2">
                            </span>
                            <span class="date meta-item">
                               
                               <div>  <span> {{ $lastArticles[1]->created_at->format('d') }}</span> {{\App\Helpers\ArabicDate::convertMonths($lastArticles[1]->created_at->format('M')) }}      </div>
                            </span>

                            <div class="clearfix"></div>
                        </div>
                        <h4 class="samll-post-title"><a href="/articles/{{ $lastArticles[1]->category->slug}}/{{$lastArticles[1]->slug}}"> {{$lastArticles[1]->title}}</a></h3>
                    </div>
                </div>
            </div>
            <div class="col-md-4 ">
                <div class="small-post article-post">
                    <a class="small-post-img"  href="/articles/{{ $lastArticles[2]->category->slug}}/{{$lastArticles[2]->slug}}">
                        <div class="article-preview-img">
                            <img src="{{Storage::url($lastArticles[2]->media_link)}}" alt="">
                            <div class="article-preview-meta">
                        
                                <div class="post-category">
                                    <a class="cat-color-{{ $lastArticles[2]->category->color}}"  href="/articles/{{ $lastArticles[2]->category->slug}}">{{$lastArticles[2]->category->name}}</a>
                                </div>
                            </div>
                        </div>
                    </a>

                    <div class="small-post-body">
                        <div class="post-meta mt-2">
                            </span>
                            <span class="date meta-item">
                                
                               <div>  <span> {{ $lastArticles[2]->created_at->format('d') }}</span> {{\App\Helpers\ArabicDate::convertMonths($lastArticles[2]->created_at->format('M')) }}      </div>
                            </span>

                            <div class="clearfix"></div>
                        </div>
                        <h4 class="samll-post-title"><a href="/articles/{{ $lastArticles[2]->category->slug}}/{{$lastArticles[2]->slug}}"> {{$lastArticles[2]->title}}</a></h3>
                    </div>
                </div>
            </div>


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

<section class="section recent-topics-bg overlay-bg-section jarallax">

    <div class="container title-section-2">
        <h2>رسائل المتابعين</h2>
    </div>


    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div id="owl" class="owl-carousel owl-theme" data-autoplay="true" data-loop="true" data-nav="false"
                    data-dots="true" data-items="3" data-items-laptop="3" data-items-tab="2" data-items-mobile="1"
                    data-items-mobile-sm="1" data-margin="15" style="display:block">
                    <div class="owl-stage-outer">
                        <div class="owl-stage">

                            <div class="owl-item">
                                <div class="topic">
                                    <div class="topic-info">
                                        
                                        <p>لوريم ايبسوم دولار سيت أميت ,كونسيكتيتور أدايبا يسكينج أليايت,سيت دو أيوسمود تيمبور

                                            أنكايديديونتيوت لابوري ات دولار ماجنا أليكيوا . يوت انيم أد مينيم فينايم,كيواس نوستريد
                                            
                                            أكسير سيتاشن يللأمكو لابورأس نيسي يت أليكيوب أكس أيا كوممودو كونسيكيوات . ديواس
                                            
                                            أيوتي أريري دولار إن ريبريهينديرأيت فوليوبتاتي فيلايت أيسسي كايلليوم دولار أيو فيجايت
                                            
                                            نيولا باراياتيور. أيكسسيبتيور ساينت أوككايكات كيوبايداتات نون بروايدينت ,سيونت ان كيولبا
                                            
                                            كيو أوفيسيا ديسيريونتموليت انيم أيدي ايست لابوريوم. 
                                        </p>
                                    </div>
                                    <a class="user-public-link" href="">


                                        <div class="topic-publisher">
                                            <div class="user-avatar">
                                                <img src="http://127.0.0.1:8000/img/user-pic.jpg" alt="">
                                            </div>
                                            <div class="user-info">
                                                <h5>صالح صالح</h5>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="owl-item">
                                <div class="topic">
                                    <div class="topic-info">
                                        
                                        <p>لوريم ايبسوم دولار سيت أميت ,كونسيكتيتور أدايبا يسكينج أليايت,سيت دو أيوسمود تيمبور

                                            أنكايديديونتيوت لابوري ات دولار ماجنا أليكيوا . يوت انيم أد مينيم فينايم,كيواس نوستريد
                                            
                                            أكسير سيتاشن يللأمكو لابورأس نيسي يت أليكيوب أكس أيا كوممودو كونسيكيوات . ديواس
                                            
                                            أيوتي أريري دولار إن ريبريهينديرأيت فوليوبتاتي فيلايت أيسسي كايلليوم دولار أيو فيجايت
                                            
                                            نيولا باراياتيور. أيكسسيبتيور ساينت أوككايكات كيوبايداتات نون بروايدينت ,سيونت ان كيولبا
                                            
                                            كيو أوفيسيا ديسيريونتموليت انيم أيدي ايست لابوريوم. 
                                        </p>
                                    </div>
                                    <a class="user-public-link" href="">


                                        <div class="topic-publisher">
                                            <div class="user-avatar">
                                                <img src="http://127.0.0.1:8000/img/user-pic.jpg" alt="">
                                            </div>
                                            <div class="user-info">
                                                <h5>صالح صالح</h5>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>

                            <div class="owl-item">
                                <div class="topic">
                                    <div class="topic-info">
                                        <p>لوريم ايبسوم دولار سيت أميت ,كونسيكتيتور أدايبا يسكينج أليايت,سيت دو أيوسمود تيمبور

                                            أنكايديديونتيوت لابوري ات دولار ماجنا أليكيوا . يوت انيم أد مينيم فينايم,كيواس نوستريد
                                            
                                            أكسير سيتاشن يللأمكو لابورأس نيسي يت أليكيوب أكس أيا كوممودو كونسيكيوات  
                                        </p>
                                    </div>
                                    <a class="user-public-link" href="">


                                        <div class="topic-publisher">
                                            <div class="user-avatar">
                                                <img src="http://127.0.0.1:8000/img/user-pic.jpg" alt="">
                                            </div>
                                            <div class="user-info">
                                                <h5>صالح صالح</h5>
                                           
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>

                            <div class="owl-item">
                                <div class="topic">
                                    <div class="topic-info">
                                        
                                        <p>لوريم ايبسوم دولار سيت أميت ,كونسيكتيتور أدايبا يسكينج أليايت,سيت دو أيوسمود تيمبور

                                            أنكايديديونتيوت لابوري ات دولار ماجنا أليكيوا . يوت انيم أد مينيم فينايم,كيواس نوستريد
                                            
                                            أكسير سيتاشن يللأمكو لابورأس نيسي يت أليكيوب أكس أيا كوممودو كونسيكيوات . ديواس
                                            
                                            أيوتي أريري دولار إن ريبريهينديرأيت فوليوبتاتي فيلايت أيسسي كايلليوم دولار أيو فيجايت
                                            
                                            نيولا باراياتيور. أيكسسيبتيور ساينت أوككايكات كيوبايداتات نون بروايدينت ,سيونت ان كيولبا
                                            
                                            كيو أوفيسيا ديسيريونتموليت انيم أيدي ايست لابوريوم. 
                                        </p>
                                    </div>
                                    <a class="user-public-link" href="">


                                        <div class="topic-publisher">
                                            <div class="user-avatar">
                                                <img src="http://127.0.0.1:8000/img/user-pic.jpg" alt="">
                                            </div>
                                            <div class="user-info">
                                                <h5>صالح صالح</h5>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>


                        </div>
                    </div>


                </div>
            </div>

        </div>
    </div>

</section>

<section class="section mb-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-lg-8">

                <div class="row trending-news">
                        <div class="container title-section-md mb-5">
                                <h3 >الأخبار</h3>
                            </div>
                    <div class="col-sm-6">
                        <img src="https://previews.123rf.com/images/byrdyak/byrdyak1509/byrdyak150900016/44850793-beautiful-landscape-with-tree-in-africa.jpg"
                            alt="">
                        <div class="post-meta mt-2">
                           
                            <span class="date meta-item">
                                <span class="fa fa-clock-o" aria-hidden="true"></span>
                                <span>جانفي 17, 2016</span>
                            </span>

                            <div class="clearfix"></div>
                        </div>
                        <h4 class="title"><a href="#"><b> يمكنك كتابة عنوان الخبر هنا </b></a></h4>

                        <p>لوريم ايبسوم دولار سيت أميت ,كونسيكتيتور أدايبا يسكينج أليايت,سيت دو أيوسمود تيمبور

                            أنكايديديونتيوت لابوري ات دولار ماجنا أليكيوا . يوت انيم أد مينيم فينايم,كيواس نوستريد
                            
                            أكسير سيتاشن يللأمكو لابورأس نيسي يت أليكيوب أكس أيا كوممودو كونسيكيوات.</p>
                    </div>
                    <div class="col-sm-6 ">
                        <a class="trending-small-item" href="#">
                            <div class="trending-small-img"><img
                                    src="https://www.shutterbug.com/images/styles/600_wide/public/promompi3718.png"
                                    alt=""></div>
                            <div class="trending-small-details">
                                <h5 class="title"><a href="#"><b> يمكنك كتابة عنوان الخبر هنا </b></a>
                                </h5>
                                <div class="post-meta mt-2">
                                  
                                    <span class="date meta-item">
                                        <span class="fa fa-clock-o" aria-hidden="true"></span>
                                        <span>Oct 17, 2016</span>
                                    </span>

                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </a><!-- oflow-hidden -->

                        <a class="trending-small-item" href="#">
                            <div class="trending-small-img"><img
                                    src="https://www.shutterbug.com/images/styles/600_wide/public/promompi3718.png"
                                    alt=""></div>
                            <div class="trending-small-details">
                                <h5 class="title"><a href="#"><b>يمكنك كتابة عنوان الخبر هنا </b></a>
                                </h5>
                                <div class="post-meta mt-2">
                                   
                                    <span class="date meta-item">
                                        <span class="fa fa-clock-o" aria-hidden="true"></span>
                                        <span>Oct 17, 2016</span>
                                    </span>

                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </a><!-- oflow-hidden -->

                        <a class="trending-small-item" href="#">
                            <div class="trending-small-img"><img
                                    src="https://www.shutterbug.com/images/styles/600_wide/public/promompi3718.png"
                                    alt=""></div>
                            <div class="trending-small-details">
                                <h5 class="title"><a href="#"><b>يمكنك كتابة عنوان الخبر هنا </b></a>
                                </h5>
                                <div class="post-meta mt-2">
                                  
                                    <span class="date meta-item">
                                        <span class="fa fa-clock-o" aria-hidden="true"></span>
                                        <span>Oct 17, 2016</span>
                                    </span>

                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </a><!-- oflow-hidden -->

                        <a class="trending-small-item" href="#">
                            <div class="trending-small-img"><img
                                    src="https://www.shutterbug.com/images/styles/600_wide/public/promompi3718.png"
                                    alt=""></div>
                            <div class="trending-small-details">
                                <h5 class="title"><a href="#"><b>يمكنك كتابة عنوان الخبر هنا </b></a>
                                </h5>
                                <div class="post-meta mt-2">
                                 
                                    <span class="date meta-item">
                                        <span class="fa fa-clock-o" aria-hidden="true"></span>
                                        <span>Oct 17, 2016</span>
                                    </span>

                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </a><!-- oflow-hidden -->
                    </div>
                   
                    <div class="link-btn   m-auto mt-5">
                        <br><br>
                            <a href="#">كل الأخبار</a>
                        </div>
                </div>
            </div>
            <div class="col-md-12 col-lg-4 ">
                    <div class="card mb-4 ">
                            <h4 class="card-header">أصناف الأخبار</h4>
                            <div class="card-body">
                                <div class="side-categories">
                                    <ul>
                                        <li >
                                            <a href="#">أعمال</a>
                                            <div class="category-count cat-color-1 ">11</div>
                                        </li>
                                        <li>
                                            <a href="#">أكل</a>
                                            <div class="category-count cat-color-2">8</div>
                                        </li>
                                        <li>
                                            <a href="#">رياضة</a>
                                            <div class="category-count cat-color-3">5</div>
                                        </li>
                                        <li >
                                            <a href="#">أعمال</a>
                                            <div class="category-count cat-color-4 ">11</div>
                                        </li>
                                        <li>
                                            <a href="#">أكل</a>
                                            <div class="category-count cat-color-5">8</div>
                                        </li>
                                        <li>
                                            <a href="#">رياضة</a>
                                            <div class="category-count cat-color-6">5</div>
                                        </li>
                                    </ul>
                                </div>




                            </div>
                        </div>
                <div class="card mb-4 ">
                    <h4 class="card-header">سبر آراء</h4>
                    <div class="card-body">
                        <div class="poll-widget">
                                <strong  class="title">كتابة نص السؤال هنا.</strong>
                                <ul>
                                    <li><input name="poll_value" type="radio" value="option 1">إجابة رقم 1</li>
                                    <li><input name="poll_value" type="radio" value="option 1">إجابة رقم 2</li>
                                    <li><input name="poll_value" type="radio" value="option 1">إجابة رقم 3</li>
                                    <li><input name="poll_value" type="radio" value="option 1">إجابة رقم 3</li>
                                </ul>
                                <button class="mt-2" type="submit" >موافق</button>
                        </div>
                        {{-- result --}}
                        <br><br>
                        <div class="poll-widget">
                            <strong class="title">نتيجة سبر الأراء.</strong>
                            <div class="poll-result">
                                <strong>إجابة رقم </strong><span class="pull-right">30%</span>
                                <div class="progress active">
                                    <div class="bar" style="width: 30%;"></div>
                                </div>
                                <strong>إجابة رقم </strong><span class="pull-right">40%</span>
                                <div class="progress  active">
                                    <div class="bar" style="width: 40%;"></div>
                                </div>
                                <strong>إجابة رقم </strong><span class="pull-right">10%</span>
                                <div class="progress active">
                                    <div class="bar" style="width: 10%;"></div>
                                </div>
                                <strong>إجابة رقم </strong><span class="pull-right">5%</span>
                                <div class="progress active">
                                    <div class="bar" style="width: 5%;"></div>
                                </div>

                            </div>


                              </div>


                    </div>
                </div>

            </div>
        </div>
    </div>
</section>






@include("layouts.footer")
