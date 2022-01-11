<?php

namespace App\Http\Controllers\RadioTeboulba;
use App\Http\Controllers\Controller;
use App\Article;
use App\ArticleCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Console;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

use Image;

class ArticleController extends Controller
{
    public function index()
    {
        //listning all articles
        $articles = Article::orderBy('created_at', 'desc')->paginate(7);

        $banner = [
            'title' => 'جميع الأصنـــاف',
            "short_description" => ''
        ];
        return view('radioTeboulba.article.articles', compact('articles', 'banner'));
    }




    public function articlesCategory($category_slug)
    {
        $category = ArticleCategory::where('slug', $category_slug)->first();

        //if this category not exist
        if ($category == null) {
            abort(404);    //show error 404 page
        } else {

                 //fetch articles of this category
            $articles = Article::where('category_id', $category->id)->orderBy('created_at', 'DESC')->paginate(5);

            //if theres not articles
            if ($articles == null) {
                abort(404); //show error page
            } else {
                $banner = [
                        'title' =>  $category->name,
                        "short_description" => $category->short_description
                    ];


                return view('radioTeboulba.article.articles', compact('articles', 'banner'));
            }
        }
    }



    public function create()
    {
    }



    public function store()
    {
    }



    public function show($category_slug, $article_slug)
    {  $category = ArticleCategory::where('slug', $category_slug)->first();
        //return specified article
        $article= Article::where('slug', $article_slug)->first();

        $banner = [
            'title' =>  $category->name,
            "short_description" => $category->short_description
        ];

        return view('radioTeboulba.article.article-post',  compact('article', 'banner'));
    }


    public function edit()
    {
    }


    public function update()
    {
    }


    public function destroy($article_id)
    {
    }
}
