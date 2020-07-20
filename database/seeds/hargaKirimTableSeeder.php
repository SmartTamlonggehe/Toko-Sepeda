<?php

use App\HargaKirim;
use App\Jasa;
use App\Kelurahan;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class hargaKirimTableSeeder extends Seeder
{
    protected $HargaKirim;
    protected $faker;

    public function __construct(HargaKirim $HargaKirim, Faker $faker)
    {
        $this->HargaKirim=$HargaKirim;
        $this->faker=$faker;
    }
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (range(1,50) as $fk) {
            $this->HargaKirim->create([
                'id_kelurahan' => Kelurahan::inRandomOrder()->first()->id,
                'id_jasa' => Jasa::inRandomOrder()->first()->id,
                'hari'=>random_int(1,6),
                'harga'=>random_int(10000,500000),
            ]);
        }
    }
}
