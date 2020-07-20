<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    protected $table='produk';
    protected $guarded=[];

    public function merek()
    {
        return $this->belongsTo(Merek::class,'id_merek');
    }

    public function getProduk()
    {
        if (substr($this->foto, 0,5)=="https") {
            return $this->foto;
        }
        if ($this->foto) {
            return asset($this->foto);
        }
    }
}
