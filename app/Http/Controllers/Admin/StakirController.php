<?php

namespace App\Http\Controllers\Admin;

use App\Bayar;
use App\Stakir;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StakirController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.pengiriman.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $stakir= Stakir::all();
        return view('admin.pengiriman.data',[
            'stakir'=> $stakir,
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Stakir  $stakir
     * @return \Illuminate\Http\Response
     */
    public function show(Stakir $stakir)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Stakir  $stakir
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Stakir::find($id);
        return $data;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Stakir  $stakir
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data =Stakir::where('id',$id)
            ->update([
                'no_resi'=>$request->no_resi,
                'status_kirim'=>$request->status_kirim,
            ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Stakir  $stakir
     * @return \Illuminate\Http\Response
     */
    public function destroy(Stakir $stakir)
    {
        //
    }
}
