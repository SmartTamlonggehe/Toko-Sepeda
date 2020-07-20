<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Jasa;
use Illuminate\Http\Request;

class JasaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.jasa.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jasa= Jasa::all();
        return view('admin.jasa.data',[
            'jasa'=> $jasa,
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
        $data = Jasa::create([
            'nm_jasa'=>$request->nm_jasa,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Jasa  $jasa
     * @return \Illuminate\Http\Response
     */
    public function show(Jasa $jasa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Jasa  $jasa
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Jasa::find($id);
        return $data;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Jasa  $jasa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data =jasa::where('id',$id)
            ->update([
                'nm_jasa'=>$request->nm_jasa,
            ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Jasa  $jasa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Jasa $jasa)
    {
        $jasa->delete();
    }
}
