<?php

use App\Kategori;
use App\Merek;
use Illuminate\Database\Seeder;

use Faker\Generator as Faker;

class MerekTableSeeder extends Seeder
{
    protected $Merek;
    protected $faker;

    public function __construct(Merek $Merek, Faker $faker)
    {
        $this->Merek=$Merek;
        $this->faker=$faker;
    }
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (range(1,10) as $fk) {
            $this->Merek->create([
                'id_kategori' => Kategori::inRandomOrder()->first()->id,
                'nm_merek'=>$this->faker->sentence(1),
            ]);
        }
    }
}
