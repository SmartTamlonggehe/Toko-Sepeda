<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(KategoriTableSeeder::class);
        $this->call(MerekTableSeeder::class);
        $this->call(ProdukTableSeeder::class);
        $this->call(RoleSeeder::class);
    }
}
