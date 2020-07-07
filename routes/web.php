<?php

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/pesan/{id}','PesanController@index');
Route::post('/pesan/{id}','PesanController@pesan');
Route::get('/check_out','PesanController@check_out');
Route::get('/check_out/{id}/delete','PesanController@delete');
Route::get('/check_out/konfirmasi','PesanController@konfirmasi');
Route::get('/profile','ProfileController@index');
Route::post('/profile/{id}/update','ProfileController@update');
Route::get('/history','HistoryController@index');
Route::get('/history/{id}','HistoryController@details');