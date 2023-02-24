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

use App\Kategori;

Route::get('/', function () {
    $data = Kategori::all();
    return view('welcome', compact('data'));
});

Route::get('/sejarah', function () {
    return view('pages.profile.sejarah');
})->name('profile.sejarah');

Route::get('/visi-misi', function () {
    return view('pages.profile.visimisi');
})->name('profile.visimisi');

Route::get('/road-map', function () {
    return view('pages.profile.roadmap');
})->name('profile.roadmap');

Route::get('/tim', function () {
    $data = [1, 2, 3, 4, 5, 6, 7];
    return view('pages.profile.tim', compact('data'));
})->name('profile.tim');

Route::get('/layanan', function () {
    $data = [1, 2, 3, 4, 5, 6, 7];
    return view('pages.layanan', compact('data'));
})->name('layanan');

Route::get('dokumen/{id}', 'KategoriController@index')->name('dokumen');

Auth::routes();

Route::get('/home', 'HomeController@index');
