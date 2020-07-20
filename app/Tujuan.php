<?php

namespace App;

use App\Kelurahan;
use Illuminate\Database\Eloquent\Model;

class Tujuan extends Model
{
    protected $table='tujuan';
    protected $guarded=[];

    public function User()
    {
        return $this->belongsTo(User::class,'id_user');
    }

    public function Kelurahan()
    {
        return $this->belongsTo(Kelurahan::class,'id_kelurahan');
    }
}
