<?php

namespace App\Http\Controllers\Pelanggan;

use App\Http\Controllers\Controller;
use App\Keranjang;
use Carbon\CarbonImmutable;
use Illuminate\Http\Request;

class KeranjangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         return view('pelanggan.layout.keranjang');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('pelanggan.keranjang.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $sekarang=CarbonImmutable::now();
        $tgl=$sekarang->isoFormat('Y-MM-DD');
        $Keranjang = new Keranjang();
        $Keranjang->id_user=$request->id_user;
        $Keranjang->id_produk=$request->id_produk;
        $Keranjang->jmlh=$request->jmlh;
        $Keranjang->status='antri';
        $Keranjang->tgl=$tgl;

        $Keranjang->save();
        dd($Keranjang);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Keranjang  $keranjang
     * @return \Illuminate\Http\Response
     */
    public function show(Keranjang $keranjang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Keranjang  $keranjang
     * @return \Illuminate\Http\Response
     */
    public function edit(Keranjang $keranjang)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Keranjang  $keranjang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Keranjang $keranjang)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Keranjang  $keranjang
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Keranjang::destroy($id);
        return $id;
    }
}
