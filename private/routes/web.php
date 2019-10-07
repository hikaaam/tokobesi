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

Route::get('/server', function () {
    return view('tokobesi/penjualan/server');
});
// Route::get('/invoice', function () {
//     return view('tokobesi/penjualan/invoice');
// });
Route::get('/js', function () {
    return view('tokobesi/penjualan/onepage');
});
Route::get('/laporanpdf', function () {
    return view('tokobesi/laporan/laporanpdf');
});
Route::resource('/', 'homesController');
Route::resource('/pembelian', 'PembelianController');
Route::resource('/pelanggan', 'PelangganController');
Route::resource('/penjualan', 'PenjualanController');
Route::resource('/product', 'ProductController');
Route::resource('/cetak', 'cetakController');
Route::resource('/laporan', 'LaporanController');
Route::resource('/del', 'deleteController');
Route::resource('/beli', 'beliController');
Route::resource('/cachepenjualan', 'PenjualancacheController');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('logout',function(){
    Auth::logout();
    return redirect()->back();
});
