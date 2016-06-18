<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

//Route::get('/', function () {
    //return view('welcome');
//});

Route::group(['middleware' => 'web'], function () {
    // Route::auth();

    // Authentication Routes
    //Route::get('/login', 'Auth\AuthController@showLoginForm');
    Route::get('/logout', 'Auth\AuthController@logout');
    Route::get('/password/reset/{token?}', 'Auth\PasswordController@showResetForm');
    //Route::get('/register', 'Auth\AuthController@showRegistrationForm');

    Route::post('/login', 'Auth\AuthController@login');
    Route::post('/password/email', 'Auth\PasswordController@sendResetLinkEmail');
    Route::post('/password/reset', 'Auth\PasswordController@reset');
    Route::post('/register', 'Auth\AuthController@register');

    Route::group(['middleware' => 'guest'], function() {
        Route::get('/', 'HomeController@index');
    });

    Route::group(['middleware' => 'auth'], function() {
        Route::get('/dashboard', 'HomeController@dashboard');
    });
});
