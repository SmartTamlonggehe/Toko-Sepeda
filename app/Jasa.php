<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jasa extends Model
{
    protected $table='jasa';
    protected $guarded=[];

    public function hargaKirim()
    {
        return $this->hasMany(HargaKirim::class,'id_jasa');
    }
}
