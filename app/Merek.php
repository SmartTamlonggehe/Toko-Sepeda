<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Merek extends Model
{
    protected $table='merek';
    protected $guarded=[];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class,'id_kategori');
    }

    public function produk()
    {
        return $this->hasMany(Produk::class,'id_merek');
    }
}
