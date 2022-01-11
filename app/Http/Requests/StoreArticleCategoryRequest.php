<?php

namespace App\Http\Requests;

use App\ArticleCategory;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class StoreArticleCategoryRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('article_category_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'name' => [
                'required',
            ],
        ];
    }
}
