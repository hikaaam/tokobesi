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
Route::get('/invoice', function () {
    return view('tokobesi/penjualan/invoice');
});
Route::get('/js', function () {
    return view('tokobesi/penjualan/jstest');
});
Route::get('/laporanpdf', function () {
    return view('tokobesi/laporan/laporanpdf');
});
Route::resource('/', 'homesController');
Route::resource('/pembelian', 'PembelianController');
Route::resource('/penjualan', 'PenjualanController');
Route::resource('/product', 'ProductController');
Route::resource('/cetak', 'cetakController');
Route::resource('/laporan', 'LaporanController');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('logout',function(){
    Auth::logout();
    return redirect()->back();
});
