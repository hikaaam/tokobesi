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

Route::get('/about', function () {
    return view('tokobesi/welcome');
});
Route::resource('/', 'homesController');
Route::resource('/pembelian', 'PembelianController');
Route::resource('/penjualan', 'PenjualanController');
Route::resource('/product', 'ProductController');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
