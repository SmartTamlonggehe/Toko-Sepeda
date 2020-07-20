<?php

namespace App\Http\Controllers\Pelanggan;

use App\Http\Controllers\Controller;
use App\Produk;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index ()
    {
        $produkBaru = Produk::take(8)->get();
        return view('pelanggan.dashboard.index', compact(
            'produkBaru'
        ));
    }

    public function login ()
    {
        return view('pelanggan.login.index');
    }
}
