@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.newsCategory.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.news-categories.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.newsCategory.fields.id') }}
                        </th>
                        <td>
                            {{ $newsCategory->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.newsCategory.fields.name') }}
                        </th>
                        <td>
                            {{ $newsCategory->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.newsCategory.fields.slug') }}
                        </th>
                        <td>
                            {{ $newsCategory->slug }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.newsCategory.fields.short_description') }}
                        </th>
                        <td>
                            {{ $newsCategory->short_description }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.newsCategory.fields.color') }}
                        </th>
                        <td>
                            {{ $newsCategory->color }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.newsCategory.fields.status') }}
                        </th>
                        <td>
                            {{ App\NewsCategory::STATUS_SELECT[$newsCategory->status] ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.news-categories.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        {{ trans('global.relatedData') }}
    </div>
    <ul class="nav nav-tabs" role="tablist" id="relationship-tabs">
        <li class="nav-item">
            <a class="nav-link" href="#category_news" role="tab" data-toggle="tab">
                {{ trans('cruds.news.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="category_news">
            @includeIf('admin.newsCategories.relationships.categoryNews', ['news' => $newsCategory->categoryNews])
        </div>
    </div>
</div>

@endsection