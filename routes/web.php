<?php

use Illuminate\Routing\RouteGroup;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'SoalController@jawab')->name('soal.jawab');
Route::post('simpan-jawaban', 'HasiUjianController@store')->name('hasil.simpan');

Route::group(['prefix' => 'admin'], function () {
    Route::group(['prefix' => 'soal'], function () {
        Route::get('/', 'SoalController@index')->name('soal.index');
        Route::get('tambah-soal', 'SoalController@create')->name('soal.create');
        Route::post('tambah-soal', 'SoalController@store')->name('soal.store');
    });
    Route::group(['prefix' => 'statistik'], function () {
        route::get('/', 'SoalController@statistik')->name('statistik.index');
        Route::get('jawaban/{nama_siswa}', 'SoalController@detailJawaban')->name('statistik.detail');
    });
});