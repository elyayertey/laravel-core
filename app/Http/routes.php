<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    //
});

Route::group(['middleware' => 'web'], function () {
    Route::auth();

    //Gets
    Route::get('/home', 'HomeController@index');
    Route::get('/settings', 'SettingsController@index');
    Route::get('/passwords', 'SettingsController@passwords');
    Route::get('/administrator', 'AdministratorController@index');
    Route::get('/users', 'AdministratorController@users');
    Route::get('/user/edit/{id}', 'UserController@edit');





    //Posts
    Route::post('/settings', 'SettingsController@save');
    Route::post('/passwords', 'SettingsController@changePassword');
    Route::post('/users', 'UserController@save');
    Route::post('/user/delete', 'UserController@delete');
});
