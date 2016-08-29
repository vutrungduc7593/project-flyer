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

Route::get('/', function() {
	return redirect('/home');
});

Route::get('/home', 'HomeController@index');

Route::resource('flyers', 'FlyersController');
Route::get('{zip}/{street}', ['as' => 'show_flyer', 'uses' => 'FlyersController@show']);
Route::post('{zip}/{street}/photos', ['as' => 'store_photo_path', 'uses' => 'PhotosController@store']);

Auth::routes();
