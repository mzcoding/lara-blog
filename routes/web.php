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
    });
});
