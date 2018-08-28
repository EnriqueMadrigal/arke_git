<?php

use Illuminate\Database\Seeder;

class EstadoObraTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
         DB::table('estado_obras')->delete();
        DB::table('estado_obras')->insert(['desc' => 'Activa']);
        DB::table('estado_obras')->insert(['desc' => 'Suspendida']);
        DB::table('estado_obras')->insert(['desc' => 'Terminada']);
        DB::table('estado_obras')->insert(['desc' => 'Otra']);
    }
}
