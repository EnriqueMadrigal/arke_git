<?php

use Illuminate\Database\Seeder;

class EstadoEquipoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('estado__equipos')->delete();
        DB::table('estado__equipos')->insert(['desc' => 'Bueno']);
        DB::table('estado__equipos')->insert(['desc' => 'Regular']);
        DB::table('estado__equipos')->insert(['desc' => 'Malo']);
        DB::table('estado__equipos')->insert(['desc' => 'Extraviado']);
        DB::table('estado__equipos')->insert(['desc' => 'Robado']);
         }
}
