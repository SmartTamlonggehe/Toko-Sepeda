<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kelurahan extends Model
{
    protected $table='kelurahan';
    protected $guarded=[];

    public function kecamatan()
    {
        return $this->belongsTo(Kecamatan::class,'id_kecamatan');
    }
}
