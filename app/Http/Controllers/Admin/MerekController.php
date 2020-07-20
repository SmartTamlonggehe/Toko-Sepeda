<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Kategori;
use App\Merek;
use Illuminate\Http\Request;

class MerekController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kategori=Kategori::all();
        return view('admin.merek.index',[
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
        $merek= Merek::with('kategori')->get()->sortBy('kategori.nm_kategori');
        return view('admin.merek.data',[
            'merek'=> $merek,
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
        $data = Merek::create([
            'id_kategori'=>$request->id_kategori,
            'nm_merek'=>$request->nm_merek,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Merek  $merek
     * @return \Illuminate\Http\Response
     */
    public function show(Merek $merek)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Merek  $merek
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Merek::find($id);
        return $data;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Merek  $merek
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data =Merek::where('id',$id)
            ->update([
                'id_kategori'=>$request->id_kategori,
                'nm_merek'=>$request->nm_merek,
            ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Merek  $merek
     * @return \Illuminate\Http\Response
     */
    public function destroy(Merek $merek)
    {
        $merek->delete();
    }
}
