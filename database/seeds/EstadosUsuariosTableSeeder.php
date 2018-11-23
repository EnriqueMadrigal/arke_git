<?php

use Illuminate\Database\Seeder;

class EstadosUsuariosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('estados__usuarios')->delete();
        DB::table('estados__usuarios')->insert(['desc' => 'Activo']);
        DB::table('estados__usuarios')->insert(['desc' => 'Suspendido']);
        DB::table('estados__usuarios')->insert(['desc' => 'Otro']);
        
    }
}
