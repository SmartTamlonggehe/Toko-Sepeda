<?php

namespace App\Http\Controllers\Pelanggan;

use App\HargaKirim;
use App\Http\Controllers\Controller;
use App\Kecamatan;
use App\Kelurahan;
use App\Tujuan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckOutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kecamatan= Kecamatan::orderBy('nm_kecamatan')->get();
        return view('pelanggan.checkout.index',[
            'kecamatan'=>$kecamatan,
        ]);
    }

    // Ambil id Kecamatan 
    public function GetKelurahan($id)
    {
        $kelurahan= Kelurahan::where('id_kecamatan',$id)->get();
        return $kelurahan;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tujuan=Tujuan::where('id_user',Auth::user()->id)->latest()->get();
        return view('pelanggan.checkout.data',[
            'tujuan'=>$tujuan,
        ]);
        
    }

    public function GetJasa($idTujuan)
    {
        $hargaKirim=HargaKirim::with('jasa')->where('id_kelurahan',$idTujuan)->get();

        return $hargaKirim;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $Kategori = new Tujuan();
        $Kategori->id_user=Auth::user()->id;
        $Kategori->nm_penerima=$request->nm_penerima;
        $Kategori->id_kelurahan=$request->id_kelurahan;
        $Kategori->alamat=$request->alamat;
        $Kategori->no_hp=$request->no_hp;

        $Kategori->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
