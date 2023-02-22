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

Route::get('/', function () {
    $data = [1, 2, 3, 4, 5, 6, 7];
    return view('welcome', compact('data'));
});

Auth::routes();

Route::get('/home', 'HomeController@index');
