<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Kecamatan;
use App\Kelurahan;
use Illuminate\Http\Request;

class KelurahanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kecamatan=Kecamatan::orderBy('nm_kecamatan')->get();
        return view('admin.kelurahan.index',[
            'kecamatan'=>$kecamatan,
        ]); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kelurahan= Kelurahan::with('kecamatan')->get()->sortBy('kecamatan.nm_kecamatan');
        return view('admin.kelurahan.data',[
            'kelurahan'=> $kelurahan,
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
        $data = Kelurahan::create([
            'id_kecamatan'=>$request->id_kecamatan,
            'nm_kelurahan'=>$request->nm_kelurahan,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Kelurahan  $kelurahan
     * @return \Illuminate\Http\Response
     */
    public function show(Kelurahan $kelurahan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Kelurahan  $kelurahan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Kelurahan::find($id);
        return $data;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Kelurahan  $kelurahan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data =Kelurahan::where('id',$id)
            ->update([
                'id_kecamatan'=>$request->id_kecamatan,
                'nm_kelurahan'=>$request->nm_kelurahan,
            ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Kelurahan  $kelurahan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kelurahan $kelurahan)
    {
        $kelurahan->delete();
    }
}
