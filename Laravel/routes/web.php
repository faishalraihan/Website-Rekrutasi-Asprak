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


Route::get('dashboard-aslab', 'AslabController@index')->name('dashboardAslab');
Route::get('view-result', 'AslabController@viewHasilAkhir')->name('viewResult');
Route::get('list-pendaftar', 'AslabController@listPendaftar')->name('listPendaftar');
Route::get('view-jawaban/{id_test}', 'AslabController@viewJawabanAsprak')->name('viewJawabanAsprak');
Route::get('/list-asprak', 'AslabController@listAsprak')->name('listAsprak');
Route::get('/login-aslab', 'AslabController@login')->name('loginAslab');
Route::post('/loginPost-aslab', 'AslabController@loginPost')->name('loginPostAslab');
Route::get('/logout-aslab', 'AslabController@logout')->name('logoutAslab');
Route::get('/register-aslab', 'AslabController@register')->name('registerAslab');
Route::get('/edit-data/{id_pendaftaran}', 'AslabController@editDataPendaftaran')->name('editDataPendaftaran');
Route::get('/delete-data/{id}', 'AslabController@destroy')->name('deleteDataPendaftaran');
Route::put('/post-update/{id_pendaftaran}', 'AslabController@postUpdate')->name('postUpdate');
Route::put('/set-soal/{id_test}', 'AslabController@setSoalAsprak')->name('setSoalAsprak');
Route::get('/delete-soal/{id}', 'SoalController@destroy')->name('deleteSoal');
Route::post('/store-aslab', 'AslabController@store');
Route::get('/editProfileAslab/{nim}/edit', 'AslabController@edit');
Route::post('/editProfileAslab/{nim}/update', 'AslabController@update');



Route::get('dashboard', 'AsprakController@dashboard')->name('dashboard');
Route::get('/logout', 'AsprakController@logout')->name('logout');
Route::get('/login', 'AsprakController@login')->name('login');
Route::get('/register', 'AsprakController@register')->name('register');
Route::get('test-tulis', 'AsprakController@testTulis');
Route::put('submit-jawaban/{id_test}', 'AsprakController@submitJawabanTest')->name('submitJawabanTest');
Route::post('/loginPost', 'AsprakController@loginPost')->name('loginPost');
Route::post('/store', 'AsprakController@store');
Route::get('/editProfile/{nim}/edit', 'AsprakController@edit');
Route::post('/editProfile/{nim}/update', 'AsprakController@update');

Route::get('daftar-asprak', 'PendaftaranController@daftarAsprak')->name('daftar-asprak');
// Route::post('/daftar', 'PendaftaranController@store');

Route::get('buat-soal', 'SoalController@index')->name('buatSoal');


Route::resource('soals', 'SoalController');
Route::resource('asprak', 'AsprakController');
Route::resource('aslab', 'AslabController');
Route::resource('pendaftarans', 'PendaftaranController');
Route::resource('tests', 'TestController');
Route::resource('hasils', 'HasilController');
