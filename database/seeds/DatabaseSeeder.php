<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       // $this->call(UsersTableSeeder::class);
        $this->call(CatalogosTableSeeder::class);
        $this->call(EstadoObraTableSeeder::class);
        $this->call(EstadoMexicoTableSeeder::class);
        $this->call(EstadoEquipoTableSeeder::class);
    }
}
