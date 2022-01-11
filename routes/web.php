<?php

/*  Route::redirect('/', '/login');
        Route::get('/home', function () {
            if (session('status')) {
                return redirect()->route('admin.home')->with('status', session('status'));
            }

            return redirect()->route('admin.home');
        });
*/

Auth::routes(['register' => false]);

Route::group(['prefix' => '', 'as' => 'radioTeboulba.', 'namespace' => 'RadioTeboulba', 'middleware' => []], function () {
    Route::get('/', 'HomeController@index')->name('home');
    // Articles route
    Route::get('/articles', 'ArticleController@index');
    Route::get('/articles/{category_slug}', 'ArticleController@articlesCategory');
    Route::get('/articles/{category_slug}/{article_slug}', 'ArticleController@show');
    // News route
    Route::get('/news', 'NewsController@index');
    Route::get('/news/{y}/{m}/{d}/{news_slug}', 'NewsController@show');
    Route::get('/news/{category_slug}', 'NewsController@newsCategory');
    // Streaming route
    Route::get('/live', 'LiveStreamController@index')->name('live');
    //Contact us
    Route::get('/contact-us', 'ContactUsController@index');
    Route::post('/contact-us', 'ContactUsController@sendMail')->name('contactus.send');
    // Utils Routes
    Route::get('/storage-link', function () {
        Artisan::call('storage:link');
        return Artisan::output();
    });
    Route::get('/cache-clear', function () {
        Artisan::call('cache:clear');
        return Artisan::output();
    });
    Route::get('/cache-config', function () {
        Artisan::call('config:cache');
        return Artisan::output();
    });
});

// Admin
Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home');

    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');
    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');
    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::post('users/media', 'UsersController@storeMedia')->name('users.storeMedia');
    Route::post('users/ckmedia', 'UsersController@storeCKEditorImages')->name('users.storeCKEditorImages');
    Route::resource('users', 'UsersController');
    // Article Categories
    Route::delete('article-categories/destroy', 'ArticleCategoryController@massDestroy')->name('article-categories.massDestroy');
    Route::resource('article-categories', 'ArticleCategoryController');
    // News Categories
    Route::delete('news-categories/destroy', 'NewsCategoryController@massDestroy')->name('news-categories.massDestroy');
    Route::resource('news-categories', 'NewsCategoryController');
    // News
    Route::delete('news/destroy', 'NewsController@massDestroy')->name('news.massDestroy');
    Route::post('news/media', 'NewsController@storeMedia')->name('news.storeMedia');
    Route::post('news/ckmedia', 'NewsController@storeCKEditorImages')->name('news.storeCKEditorImages');
    Route::resource('news', 'NewsController');
    // Articles
    Route::delete('articles/destroy', 'ArticleController@massDestroy')->name('articles.massDestroy');
    Route::post('articles/media', 'ArticleController@storeMedia')->name('articles.storeMedia');
    Route::post('articles/ckmedia', 'ArticleController@storeCKEditorImages')->name('articles.storeCKEditorImages');
    Route::resource('articles', 'ArticleController');

    // Fans Messages
    Route::delete('fans-messages/destroy', 'FansMessageController@massDestroy')->name('fans-messages.massDestroy');
    Route::post('fans-messages/media', 'FansMessageController@storeMedia')->name('fans-messages.storeMedia');
    Route::post('fans-messages/ckmedia', 'FansMessageController@storeCKEditorImages')->name('fans-messages.storeCKEditorImages');
    Route::resource('fans-messages', 'FansMessageController');

    // Radio Programs
    Route::delete('radio-programs/destroy', 'RadioProgramController@massDestroy')->name('radio-programs.massDestroy');
    Route::post('radio-programs/media', 'RadioProgramController@storeMedia')->name('radio-programs.storeMedia');
    Route::post('radio-programs/ckmedia', 'RadioProgramController@storeCKEditorImages')->name('radio-programs.storeCKEditorImages');
    Route::resource('radio-programs', 'RadioProgramController');
});

Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'Auth', 'middleware' => ['auth']], function () {
    // Change password
    if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
        Route::get('password', 'ChangePasswordController@edit')->name('password.edit');
        Route::post('password', 'ChangePasswordController@update')->name('password.update');
    }
});

