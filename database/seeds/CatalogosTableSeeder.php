<?php

use Illuminate\Database\Seeder;

class CatalogosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
          DB::table('catalogos')->delete();
        DB::table('catalogos')->insert(['desc' => 'Electricos']);
        DB::table('catalogos')->insert(['desc' => 'Tablaroca']);
        DB::table('catalogos')->insert(['desc' => 'Construcción']);
        DB::table('catalogos')->insert(['desc' => 'Seguridad']);
    }
}
