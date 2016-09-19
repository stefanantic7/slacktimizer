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
Route::get('/', 'HomeController@show');
Route::post('/', 'HomeController@send');
Route::get('/{user}','HomeController@get');
// Channels routes
Route::get('/channels/get', 'ChannelsController@getChannels');

// Messages routes
Route::get('/direct', 'MessagesController@show');
Route::post('/direct/send', 'MessagesController@send');

Route::get('send', 'Messages@send');
Route::post('send', 'Messages@send');

Route::get('show', 'Messages@show');
Route::get('/test', 'TestController@index');


