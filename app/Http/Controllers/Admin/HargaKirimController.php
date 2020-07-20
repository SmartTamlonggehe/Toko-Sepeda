<?php

namespace App\Http\Controllers\Admin;

use App\HargaKirim;
use App\Http\Controllers\Controller;
use App\Jasa;
use App\Kecamatan;
use App\Kelurahan;
use Illuminate\Http\Request;

class HargaKirimController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jasa=Jasa::orderBy('nm_jasa')->get();
        $kecamatan=Kecamatan::orderBy('nm_kecamatan')->get();
        $kelurahan=Kelurahan::orderBy('nm_kelurahan')->get();
        return view('admin.hargaKirim.index',[
            'kecamatan'=>$kecamatan,
            'kelurahan'=>$kelurahan,
            'jasa'=>$jasa,
        ]); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $hargaKirim= hargaKirim::with('kelurahan')->get()->sortBy('kelurahan.nm_kelurahan');
        return view('admin.hargaKirim.data',[
            'hargaKirim'=> $hargaKirim,
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
        $data = HargaKirim::create([
            'id_kelurahan'=>$request->id_kelurahan,
            'id_jasa'=>$request->id_jasa,
            'hari'=>$request->hari,
            'harga'=>$harga,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\HargaKirim  $hargaKirim
     * @return \Illuminate\Http\Response
     */
    public function show(HargaKirim $hargaKirim)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\HargaKirim  $hargaKirim
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    { 
        $data = hargaKirim::find($id);
        return $data;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\HargaKirim  $hargaKirim
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $harga  = preg_replace('/[^\w]/', '',$request->harga);
        $data =HargaKirim::where('id',$id)
            ->update([
                'id_kelurahan'=>$request->id_kelurahan,
                'id_jasa'=>$request->id_jasa,
                'hari'=>$request->hari,
                'harga'=>$harga,
            ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\HargaKirim  $hargaKirim
     * @return \Illuminate\Http\Response
     */
    public function destroy(HargaKirim $hargaKirim)
    {
        $hargaKirim->delete();
    }
}
