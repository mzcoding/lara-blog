<?php

Route::get('/', 'ArticlesController@index');

//blog
Route::get('/article/{id}/{slug}.html', 'ArticlesController@showArticle')->where('id', '\d')->name('blog.show');



Route::group(['middleware' => 'guest'], function (){
    Route::get('/register', 'Auth\RegisterController@showRegistrationForm')->name('register');
    Route::post('/register', 'Auth\RegisterController@register');
    Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');
    Route::post('/login', 'Auth\LoginController@login');
});
//account
Route::group(['middleware' => 'auth'], function(){
   Route::get('/logout', function(){
       \Auth::logout();
       return redirect(route('login'));
   })->name('logout');
   Route::get('/my/account', 'AccountController@index')->name('account');

   //comments
   Route::post('/comments/add', 'CommentsController@addComment')->name('comments.add');

   //admin
    Route::group(['middleware' => 'admin', 'prefix' => 'admin'], function() {
        Route::get('/', 'Admin\AccountController@index')->name('admin');
        /** Categories */
        Route::get('/categories', 'Admin\CategoriesController@index')->name('categories');
        Route::get('/categories/add', 'Admin\CategoriesController@addCategory')->name('categories.add');
        Route::post('/categories/add', 'Admin\CategoriesController@addRequestCategory');
        Route::get('/categories/edit/{id}', 'Admin\CategoriesController@editCategory')
                ->where('id', '\d+')
                ->name('categories.edit');
        Route::post('/categories/edit/{id}', 'Admin\CategoriesController@editRequestCategory')
            ->where('id', '\d+');
        Route::delete('/categories/delete', 'Admin\CategoriesController@deleteCategory')->name('categories.delete');
        /**Articles*/
        Route::get('/articles', 'Admin\ArticlesController@index')->name('articles');
        Route::get('/articles/add', 'Admin\ArticlesController@addArticle')->name('articles.add');
        Route::post('/articles/add', 'Admin\ArticlesController@addRequestArticle');
        Route::get('/articles/edit/{id}', 'Admin\ArticlesController@editArticle')->where('id', '\d+')->name('articles.edit');
        Route::post('/articles/edit/{id}', 'Admin\ArticlesController@editRequestArticle')->where('id', '\d+');
        Route::delete('/articles/delete', 'Admin\ArticlesController@deleteArticle')->name('articles.delete');

        /** Users */
        Route::get('/users', 'Admin\UsersController@index')->name('users');

        Route::get('/comments', 'Admin\CommentsController@index')->name('comments');
        Route::get('/comments/accepted/{id}', 'Admin\CommentsController@acceptComment')
               ->where('id', '\d+')->name('comment.accepted');
    });
});
