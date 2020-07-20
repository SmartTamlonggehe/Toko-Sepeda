<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bayar extends Model
{
    protected $table='bayar';
    protected $guarded=[];

    public function satkir()
    {
        return $this->hasMany(Stakir::class,'id_bayar');
    }
    public function tujuan()
    {
        return $this->belongsTo(Tujuan::class,'id_tujuan');
    }
    public function hargaKirim()
    {
        return $this->belongsTo(HargaKirim::class,'id_haki');
    }
}
