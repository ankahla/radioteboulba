<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\ArticleCategory;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreArticleCategoryRequest;
use App\Http\Requests\UpdateArticleCategoryRequest;
use App\Http\Resources\Admin\ArticleCategoryResource;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ArticleCategoryApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('article_category_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ArticleCategoryResource(ArticleCategory::all());
    }

    public function store(StoreArticleCategoryRequest $request)
    {
        $articleCategory = ArticleCategory::create($request->all());

        return (new ArticleCategoryResource($articleCategory))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(ArticleCategory $articleCategory)
    {
        abort_if(Gate::denies('article_category_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ArticleCategoryResource($articleCategory);
    }

    public function update(UpdateArticleCategoryRequest $request, ArticleCategory $articleCategory)
    {
        $articleCategory->update($request->all());

        return (new ArticleCategoryResource($articleCategory))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(ArticleCategory $articleCategory)
    {
        abort_if(Gate::denies('article_category_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $articleCategory->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
