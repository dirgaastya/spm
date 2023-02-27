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

use App\JenisDokumen;

Route::get('/', function () {
    $data = JenisDokumen::all();
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

Route::get('dokumen/{id}', 'JenisDokumenController@guesIndex')->name('dokumen');

Route::group(['prefix' => 'home', 'middleware' => 'auth'], function () {
    Route::group(['prefix' => 'dokumen'], function () {
        Route::get('/', 'DokumenController@index')->name('dokumen.index');
        Route::get('/add', 'DokumenController@create')->name('dokumen.create');
        Route::post('/', 'DokumenController@store')->name('dokumen.store');
        Route::get('/edit/{id}', 'DokumenController@edit')->name('dokumen.edit');
        Route::put('/{id}', 'DokumenController@edit')->name('dokumen.update');
        Route::delete('/{id}', 'DokumenController@destroy')->name('dokumen.destroy');
    });
    Route::group(['prefix' => 'jenis-dokumen'], function () {
        Route::get('/', 'JenisDokumenController@index')->name('jenis-dokumen.index');
        Route::get('/tambah-jenis', 'JenisDokumenController@create')->name('jenis-dokumen.create');
        Route::post('/', 'JenisDokumenController@store')->name('jenis-dokumen.store');
        Route::get('/edit/{id}', 'JenisDokumenController@edit')->name('jenis-dokumen.edit');
        Route::put('/{id}', 'JenisDokumenController@edit')->name('jenis-dokumen.update');
        Route::delete('/{id}', 'JenisDokumenController@destroy')->name('jenis-dokumen.destroy');
    });
});

Auth::routes();
Route::get('/home', 'HomeController@index');
