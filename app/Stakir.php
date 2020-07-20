<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stakir extends Model
{
    protected $table='stakir';
    protected $guarded=[];

    public function bayar()
    {
        return $this->belongsTo(Bayar::class,'id_bayar');
    }
}
