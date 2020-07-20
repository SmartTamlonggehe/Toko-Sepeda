<?php

namespace App\Http\Controllers\Pelanggan;

use App\Http\Controllers\Controller;
use App\Produk;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function index ()
    {
        $produk = Produk::paginate(10);
        return view('pelanggan.produk.index', [
            'produk'=>$produk
        ]);
    }

    public function katProduk($id) 
    {
        // $katProduk = Produk::with('merek')->get();

        $produk = Produk::whereHas('merek', function($query) use ($id){
            $query->where('id_kategori','=',$id);
        })->paginate(10);

        
        return view('pelanggan.produk.index',[
            'produk'=>$produk
        ]);
     
    }


    public function detProduk($id) 
    {
        $detProduk = Produk::where('id',$id)->get();
        $produkLain = Produk::orderByRaw('RAND()')->where('id', 'NOT LIKE',$id)->take(10)->get();     
       
        return view('pelanggan.produk.detProduk', [
            'detProduk'=>$detProduk,
            'produkLain'=>$produkLain,
        ]);
    }
}
