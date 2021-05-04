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

Route::get('test-tulis', 'AsprakController@testTulis');
Route::get('daftar-asprak', 'PendaftaranController@daftarAsprak')->name('daftar-asprak');
Route::post('/daftar', 'PendaftaranController@store');
Route::get('dashboard', 'AsprakController@dashboard')->name('dashboard');
Route::get('dashboardAslab', 'AslabController@index')->name('dashboardAslab');
Route::get('/listAsprak', 'AslabController@listAsprak')->name('listAsprak');
Route::get('/logout', 'AsprakController@logout')->name('logout');
Route::get('/login', 'AsprakController@login')->name('login');
Route::post('/loginPost', 'AsprakController@loginPost')->name('loginPost');
Route::get('/register', 'AsprakController@register')->name('register');
Route::post('/store', 'AsprakController@store');
Route::resource('asprak', 'AsprakController');

Route::resource('aslab', 'AslabController');
Route::resource('pendaftaran', 'PendaftaranController');

