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
Route::get('/channels/get', 'ChannelController@getChannels');

// Messages routes
Route::get('/direct', 'MessageController@index');
Route::get('/direct/send', 'MessageController@show');
Route::post('/direct/send', 'MessageController@send');
Route::get('/direct/ims', 'MessageController@getIms');

Route::get('/test', 'TestController@index');


//$2y$10$LO8pdWX6YW2cRB7NDXvSce7GpYMRLW2h.YfxNkl3ldeCqsH1KJlAi