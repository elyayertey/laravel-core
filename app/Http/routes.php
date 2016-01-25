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
    Route::get('/messages/inbox', 'MessageController@index');
    Route::get('/messages/sent', 'MessageController@sent');
    Route::get('/messages/compose', 'MessageController@compose');
    Route::get('/messages/read/{id}', 'MessageController@read');
    Route::get('/users/roles', 'RolesController@index');






    //Posts
    Route::post('/settings', 'SettingsController@save');
    Route::post('/passwords', 'SettingsController@changePassword');
    Route::post('/users/edit/{id}', 'UserController@save');
    Route::post('/user/status', 'UserController@status');
    Route::post('/compose/send', 'MessageController@send');
    Route::post('/messages/delete', 'MessageController@delete');
    Route::post('/messages/read/{id}', 'MessageController@savereply');
    Route::post('/users/roles', 'RolesController@save');
    Route::post('/users/roles/delete', 'RolesController@delete');


});
