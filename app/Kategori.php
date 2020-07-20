<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    protected $table='kategori';
    protected $guarded=[];

    public function merek()
    {
        return $this->hasMany(Merek::class,'id_kategori');
    }
}
