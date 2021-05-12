<?php

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

Route::get('/', function () {
    return view('pages.homepage');
})->name('home');


Route::get('dashboardAslab', 'AslabController@index')->name('dashboardAslab');
Route::get('/listAsprak', 'AslabController@listAsprak')->name('listAsprak');
Route::get('/login-aslab', 'AslabController@login')->name('loginAslab');
Route::post('/loginPost-aslab', 'AslabController@loginPost')->name('loginPostAslab');
Route::get('/register-aslab', 'AslabController@register')->name('registerAslab');
Route::post('/store-aslab', 'AslabController@store');



Route::get('dashboard', 'AsprakController@dashboard')->name('dashboard');
Route::get('/logout', 'AsprakController@logout')->name('logout');
Route::get('/login', 'AsprakController@login')->name('login');
Route::post('/loginPost', 'AsprakController@loginPost')->name('loginPost');
Route::get('/register', 'AsprakController@register')->name('register');
Route::get('test-tulis', 'AsprakController@testTulis');
Route::post('/store', 'AsprakController@store');
Route::get('/editProfile', 'AsprakController@edit');
Route::get('/editProfile/{nim}/edit', 'AsprakController@edit');
Route::post('/editProfile/{nim}/update', 'AsprakController@update');
Route::get('daftar-asprak', 'PendaftaranController@daftarAsprak')->name('daftar-asprak');
Route::post('/daftar', 'PendaftaranController@store');

Route::get('buat-soal', 'SoalController@index')->name('buatSoal');


Route::resource('soals', 'SoalController');
Route::resource('asprak', 'AsprakController');
Route::resource('aslab', 'AslabController');
Route::resource('pendaftaran', 'PendaftaranController');
