<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Keranjang extends Model
{
    protected $table='keranjang';
    protected $guarded=[];

    public function produk()
    {
        return $this->belongsTo(Produk::class,'id_produk');
    }

    public function users()
    {
        return $this->belongsTo(User::class,'id_user');
    }
}
