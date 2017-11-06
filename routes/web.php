<?php

Route::get('/', function () {
    return view('welcome');
});

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

   //admin
    Route::group(['middleware' => 'admin'], function() {
        Route::get('/admin', 'Admin\AccountController@index')->name('admin');

        Route::get('/categories', 'Admin\CategoriesController@index')->name('categories');
        Route::get('/categories/add', 'Admin\CategoriesController@addCategory')->name('categories.add');
        Route::get('/categories/edit/{id}', 'Admin\CategoriesController@editCategory')
                ->where('id', '\d+')
                ->name('categories.edit');
        Route::delete('/categories/delete', 'Admin\CategoriesController@deleteCategory')->name('categories.delete');
    });
});
