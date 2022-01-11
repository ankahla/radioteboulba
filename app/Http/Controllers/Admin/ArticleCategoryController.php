<?php

namespace App\Http\Controllers\Admin;

use App\ArticleCategory;
use App\Helpers\StrUtils;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyArticleCategoryRequest;
use App\Http\Requests\StoreArticleCategoryRequest;
use App\Http\Requests\UpdateArticleCategoryRequest;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ArticleCategoryController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('article_category_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $articleCategories = ArticleCategory::all();

        return view('admin.articleCategories.index', compact('articleCategories'));
    }

    public function create()
    {
        abort_if(Gate::denies('article_category_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.articleCategories.create');
    }

    public function store(StoreArticleCategoryRequest $request)
    {
        $request['slug'] = 'صنف-'.StrUtils::slugify($request['name']);
        $articleCategory = ArticleCategory::create($request->all());

        return redirect()->route('admin.article-categories.index');
    }

    public function edit(ArticleCategory $articleCategory)
    {
        abort_if(Gate::denies('article_category_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.articleCategories.edit', compact('articleCategory'));
    }

    public function update(UpdateArticleCategoryRequest $request, ArticleCategory $articleCategory)
    {
        $request['slug'] = 'صنف-'.StrUtils::slugify($request['name']);
        $articleCategory->update($request->all());

        return redirect()->route('admin.article-categories.index');
    }

    public function show(ArticleCategory $articleCategory)
    {
        abort_if(Gate::denies('article_category_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $articleCategory->load('categoryArticles');

        return view('admin.articleCategories.show', compact('articleCategory'));
    }

    public function destroy(ArticleCategory $articleCategory)
    {
        abort_if(Gate::denies('article_category_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $articleCategory->delete();

        return back();
    }

    public function massDestroy(MassDestroyArticleCategoryRequest $request)
    {
        ArticleCategory::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
