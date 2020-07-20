<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Kategori;
use App\Merek;
use App\Produk;
use Illuminate\Http\Request;
use File;


class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $merek=Merek::all();
        $kategori=Kategori::all();
        return view('admin.produk.index',[
            'merek'=>$merek,
            'kategori'=>$kategori,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $produk= Produk::orderBy('nm_produk')->get();
        return view('admin.produk.data',[
            'produk'=> $produk,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $harga  = preg_replace('/[^\w]/', '',$request->harga);
        // $foto= $request->file('foto')->store('foto');
        if ($request->hasFile('foto')) {
            $name = time().'.'. $request->foto->getClientOriginalExtension();
            $foto=$request->foto->move( public_path() . '/foto/', $name);
        }
        $data = Produk::create([
            'id_merek'=>$request->id_merek,
            'nm_produk'=>$request->nm_produk,
            'berat'=>$request->berat,
            'harga'=>$harga,
            'stok'=>$request->stok,
            'foto'=>'foto/'.$name,
        ]);
        return $foto;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function show(Produk $produk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Produk::find($id);
        return $data;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    { 
        // if ($request->hasFile('foto')) {
        //     $name = $request->foto;
        //     $foto=$request->foto->move( public_path() . '/foto/', $name);
        // } else {
        //     $foto=Produk::select('foto')->where('id',$id)->get();
        // }
        $harga  = preg_replace('/[^\w]/', '',$request->harga);
        $data =Produk::where('id',$id)
            ->update([
                'id_merek'=>$request->id_merek,
                'nm_produk'=>$request->nm_produk,
                'berat'=>$request->berat,
                'harga'=>$harga,
                'stok'=>$request->stok,
                'foto'=>$request->stok,
            ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function destroy(Produk $produk)
    {
        $foto=$produk->foto;
        if (substr($foto, 0,5)=="https") {
            $produk->delete();
        }else {
            File::delete($foto);
            $produk->delete();
        }
    }
}
