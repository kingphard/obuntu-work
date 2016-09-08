<?php

use App\Category;
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

Route::get('/', function () {
    return view('index');
});
//Route::get('/staff', 'contactController@contact');

Auth::routes();

Route::get('/home', 'HomeController@index');

//Route::resource('/media', 'MediaController');
	
Route::post('/home', 'HomeController@store');

Route::get('/video_upload', function(){
	return view('/video_upload');
});

Route::post('/video_upload', 'VideoController@store');

Route::get('/audio_upload', function(){
	return view('/audio_upload');
});

Route::post('/audio_upload', 'AudioController@store');




