<?php

use App\Kategori;
use Illuminate\Database\Seeder;


class KategoriTableSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Kategori::create([
            'nm_kategori'=>'Rem',
        ]);
        Kategori::create([
            'nm_kategori'=>'Pedal',
        ]);
        Kategori::create([
            'nm_kategori'=>'Rantai',
        ]);
        Kategori::create([
            'nm_kategori'=>'Saddel',
        ]);
        Kategori::create([
            'nm_kategori'=>'Footstep',
        ]);
    }
}
