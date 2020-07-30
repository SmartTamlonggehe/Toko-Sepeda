<?php

namespace App\Http\Controllers\Pelanggan;

use App\Bayar;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Keranjang;

class BayarController extends Controller
{
    public function tambahBayar(Request $request)
    {
        $bayar = new Bayar();
        $bayar->id_tujuan=$request->id_tujuan;
        $bayar->id_haki=$request->id_haki;
        $bayar->bank=$request->bank;
        $bayar->total_bayar=$request->total_bayar;
        $bayar->status='Belum Bayar';

        $bayar->save();
        $this->ubahKeranjang();

        return redirect()->route('lihatBayar');
    }

    public function ubahKeranjang()
    {
        $data =Keranjang::where('id_user',auth()->user()->id)
            ->update([
                'status'=>'Bayar',
            ]);
    }

    public function lihatBayar()
    {
        $bayar= Bayar::with(['tujuan'=>function ($tujuan){
            $tujuan->where('id_user',auth()->user()->id);
        }])->first();


        return view('pelanggan.bayar.index',compact('bayar'));
    }
}
