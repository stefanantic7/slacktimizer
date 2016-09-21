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
Route::post('/', 'HomeController@send');

// Get chats

// Channels routes
Route::get('/channels/get', 'ChannelController@get');
Route::get('/channels/chat/{chat}', 'ChannelController@chat');

// Messages routes
Route::get('/ims', 'ImController@index');
Route::get('/ims/chat/{chat}', 'ImController@chat');
Route::post('/ims/send', 'ImController@send');
Route::get('/ims/get', 'ImController@get');

Route::get('/test', 'TestController@index');


