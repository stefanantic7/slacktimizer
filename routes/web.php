<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/


Auth::routes();
Route::get('auth/slack', 'Auth\LoginController@redirectToProvider');
Route::get('auth/slack/callback', 'Auth\LoginController@handleProviderCallback');

Route::get('/', 'HomeController@index');

Route::get('send', 'Messages@send');
Route::post('send', 'Messages@send');

Route::get('show', 'Messages@show');
Route::get('/test', 'TestController@index');

