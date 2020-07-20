<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HargaKirim extends Model
{
    protected $table='harga_kirim';
    protected $guarded=[];

    public function jasa()
    {
        return $this->belongsTo(Jasa::class,'id_jasa');
    }

    public function kelurahan()
    {
        return $this->belongsTo(Kelurahan::class,'id_kelurahan');
    }
}
