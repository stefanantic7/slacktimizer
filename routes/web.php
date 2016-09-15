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

// Auth routes
Auth::routes();
Route::get('auth/slack', 'Auth\LoginController@redirectToProvider');
Route::get('auth/slack/callback', 'Auth\LoginController@handleProviderCallback');

// Main home route
Route::get('/', 'HomeController@index');

// Channels routes
Route::get('/channels/get', 'ChannelController@getChannels');

// Messages routes
Route::get('/direct', 'MessageController@index');
Route::get('/direct/send', 'MessageController@show');
Route::post('/direct/send', 'MessageController@send');
Route::get('/direct/ims', 'MessageController@getIms');

Route::get('/test', 'TestController@index');

