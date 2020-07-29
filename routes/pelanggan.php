<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// $role = auth()->user()->role;

Route::get('loginKu', 'DashboardController@login')->name('loginPelanggan');
Route::get('registerKu', function(){
    return view('pelanggan.login.register');
});

if(Auth::check()){
    Route::get('/', 'DashboardController@indexdafes')->name('pelanggan');
    // Route::group(['middleware' => ['web','auth','verified']], function () {
    //     Route::get('/', 'DashboardController@index')->name('pelanggan');

    //     exit;

    // });
} else {
    Route::get('/', 'DashboardController@index')->name('pelanggan');
}



Route::get('produk', 'ProdukController@index')->name('produk');
Route::get('produk/{id}', 'ProdukController@katProduk')->name('katProduk');
Route::get('detProduk/{id}', 'ProdukController@detProduk')->name('detProduk');


Route::resource('keranjang', 'KeranjangController');

Route::resource('checkout', 'CheckOutController')->middleware('auth','verified');
Route::get('/getkelurahan/{id}', 'CheckOutController@GetKelurahan')->name('getkelurahan');
Route::get('/getjasa/{idTujuan}', 'CheckOutController@GetJasa')->name('getjasa');

Route::post('tambahBayar', 'BayarController@tambahBayar')->name('tambahBayar');
// Route::get('tampilBayar', 'BayarController@tampilBayar')->name('tampilBayar');
