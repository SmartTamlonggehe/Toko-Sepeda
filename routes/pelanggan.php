<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'DashboardController@index')->name('pelanggan');
Route::get('produk', 'ProdukController@index')->name('produk');
Route::get('produk/{id}', 'ProdukController@katProduk')->name('katProduk');
Route::get('detProduk/{id}', 'ProdukController@detProduk')->name('detProduk');

Route::get('loginKu', 'DashboardController@login')->name('loginPelanggan');
Route::get('registerKu', function(){
    return view('pelanggan.login.register');
});


Route::resource('keranjang', 'KeranjangController');

Route::resource('checkout', 'CheckOutController')->middleware('auth');
Route::get('/getkelurahan/{id}', 'CheckOutController@GetKelurahan')->name('getkelurahan');
Route::get('/getjasa/{idTujuan}', 'CheckOutController@GetJasa')->name('getjasa');

Route::post('tambahBayar', 'BayarController@tambahBayar')->name('tambahBayar');
// Route::get('tampilBayar', 'BayarController@tampilBayar')->name('tampilBayar');
