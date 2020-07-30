<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('admin.dashboard.index');
})->name('admin');

Route::resource('kategori', 'KategoriController');
Route::resource('merek', 'MerekController');
Route::resource('produk', 'ProdukController');

Route::resource('kecamatan', 'KecamatanController');
Route::resource('kelurahan', 'KelurahanController');
Route::resource('jasa', 'JasaController');
Route::resource('hargaKirim', 'HargaKirimController');

Route::resource('pembayaran', 'BayarController');
Route::resource('pengiriman', 'StakirController');
