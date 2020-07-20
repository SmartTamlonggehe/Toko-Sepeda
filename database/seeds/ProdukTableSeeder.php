<?php

use App\Merek;
use App\Produk;
use Illuminate\Database\Seeder;

use Faker\Generator as Faker;

class ProdukTableSeeder extends Seeder
{
    protected $Produk;
    protected $faker;

    public function __construct(Produk $Produk, Faker $faker)
    {
        $this->Produk=$Produk;
        $this->faker=$faker;
    }
    /**
     * Run the database seeds.
     *
     * @return void
     */


    public function run()
    {
        foreach (range(1,110) as $fk) {
            $randomNumber=rand(1,1000);
            $foto="https://picsum.photos/id/{$randomNumber}/200/300";
            $this->Produk->create([
                'id_merek' => Merek::inRandomOrder()->first()->id,
                'nm_produk'=>$this->faker->sentence(1),
                'berat'=>random_int(1,6),
                'harga'=>random_int(10000,500000),
                'stok'=>random_int(1,20),
                'foto'=>$foto,
            ]);
        }
    }
}
