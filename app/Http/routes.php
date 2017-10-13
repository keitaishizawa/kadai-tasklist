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
Route::get('tasks', 'TasksController@index');

// ユーザ登録
Route::get('signup', 'Auth\AuthController@getRegister')->name('signup.get');
Route::post('signup', 'Auth\AuthController@postRegister')->name('signup.post');

// ログイン認証
Route::get('login', 'Auth\AuthController@getLogin')->name('login.get');
Route::post('login', 'Auth\AuthController@postLogin')->name('login.post');
Route::get('logout', 'Auth\AuthController@getLogout')->name('logout.get');

// 上記以外の画面は全て非ログインの場合はログイン認証画面へリダイレクト
Route::group(['middleware' => 'auth'], function(){
  Route::resource('tasks', 'TasksController', ['only' => ['show', 'store', 'update', 'destroy', 'create', 'edit']]);  
});
