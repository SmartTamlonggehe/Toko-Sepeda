<?php

use App\Kecamatan;
use App\Kelurahan;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class KelurahanTableSeeder extends Seeder
{
    protected $kelurahan;
    protected $faker;

    public function __construct(Kelurahan $kelurahan, Faker $faker)
    {
        $this->kelurahan=$kelurahan;
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
            $this->kelurahan->create([
                'id_kecamatan' => Kecamatan::inRandomOrder()->first()->id,
                'nm_kelurahan'=>$this->faker->streetName(),
            ]);
        }
    }
}
