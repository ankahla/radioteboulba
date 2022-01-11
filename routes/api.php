<?php

Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin', 'middleware' => ['auth:api']], function () {
    // Permissions
    Route::apiResource('permissions', 'PermissionsApiController');

    // Roles
    Route::apiResource('roles', 'RolesApiController');

    // Users
    Route::post('users/media', 'UsersApiController@storeMedia')->name('users.storeMedia');
    Route::apiResource('users', 'UsersApiController');

    // Article Categories
    Route::apiResource('article-categories', 'ArticleCategoryApiController');

    // News Categories
    Route::apiResource('news-categories', 'NewsCategoryApiController');

    // News
    Route::post('news/media', 'NewsApiController@storeMedia')->name('news.storeMedia');
    Route::apiResource('news', 'NewsApiController');

    // Articles
    Route::post('articles/media', 'ArticleApiController@storeMedia')->name('articles.storeMedia');
    Route::apiResource('articles', 'ArticleApiController');

    // Fans Messages
    Route::post('fans-messages/media', 'FansMessageApiController@storeMedia')->name('fans-messages.storeMedia');
    Route::apiResource('fans-messages', 'FansMessageApiController');

    // Radio Programs
    Route::post('radio-programs/media', 'RadioProgramApiController@storeMedia')->name('radio-programs.storeMedia');
    Route::apiResource('radio-programs', 'RadioProgramApiController');
});
