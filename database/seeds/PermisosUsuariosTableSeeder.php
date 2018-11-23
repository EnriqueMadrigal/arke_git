<?php

use Illuminate\Database\Seeder;

class PermisosUsuariosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('permisos__usuarios')->delete();
        DB::table('permisos__usuarios')->insert(['desc' => 'Administradores']);
        DB::table('permisos__usuarios')->insert(['desc' => 'Supervisores']);
        DB::table('permisos__usuarios')->insert(['desc' => 'Operadores']);
    }
}
