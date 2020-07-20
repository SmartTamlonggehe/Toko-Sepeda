<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kecamatan extends Model
{
    protected $table='kecamatan';
    protected $guarded=[];

    public function kelurahan()
    {
        return $this->hasMany(Kelurahan::class,'id_kecamatan');
    }
}
