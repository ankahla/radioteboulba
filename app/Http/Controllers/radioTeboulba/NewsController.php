<?php

namespace App\Http\Controllers\RadioTeboulba;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\News;
use App\NewsCategory;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Console;
use Illuminate\Support\Str;
class NewsController extends Controller
{
    //
    public function index()
    {
       //listning all articles
       $news = News::orderBy('created_at', 'DESC')->paginate(10);
       $banner = [
        'title' => 'جميع الأصنـــاف',
        "short_description" => ''
    ];


       return view('radioteboulba.news.news', compact('news','banner'));

    }



   public function newsCategory($category_slug)
    {

            $category = NewsCategory::where('slug',$category_slug)->first();

            //if this category not exist
            if($category == null){
                abort(404);    //show error 404 page
            }
            else{

                 //fetch articles of this category
                  $news = News::where('category_id',$category->id)->orderBy('created_at', 'DESC')->paginate(5);

                 //if theres not articles
                 if ($news == null){
                     abort(404); //show error page
                    }
                 else {

                    $banner = [
                        'title' =>  $category->name,
                        "short_description" => $category->short_description
                    ];


                     return view('radioTeboulba.news.news', compact('news','banner'));
                 }
               }


    }







   public function show($year,$month,$day,$news_slug)
    {  //return specified article
        $newsPost= News::where('slug',$news_slug)->first();
        $category = NewsCategory::where('slug', $newsPost->category->slug)->first();

        $banner = [
            'title' =>  $category->name,
            "short_description" => $category->short_description
        ];


        return view('radioTeboulba.news.news-post', compact('newsPost','banner'));
    }

}

