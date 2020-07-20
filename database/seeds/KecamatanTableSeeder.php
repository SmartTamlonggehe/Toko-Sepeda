<?php

use App\Kecamatan;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class KecamatanTableSeeder extends Seeder
{
    protected $kecamatan;
    protected $faker;

    public function __construct(Kecamatan $kecamatan, Faker $faker)
    {
        $this->kecamatan=$kecamatan;
        $this->faker=$faker;
    }
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (range(1,20) as $fk) {
            $this->kecamatan->create([
                'nm_kecamatan'=>$this->faker->country(),
            ]);
        }
    }
}
