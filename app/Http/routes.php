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

// トップ画面
Route::get('/', 'TasksController@index');

// ユーザ登録
Route::get('sidnup', 'Auth\AuthController@getRegister')->name('signup.get');
Route::post('sidnup', 'Auth\AuthController@postRegister')->name('signup.post');

Route::resource('tasks', 'TasksController');