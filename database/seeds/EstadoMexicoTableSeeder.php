<?php

use Illuminate\Database\Seeder;

class EstadoMexicoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
         DB::table('estado__mexicos')->delete();
        DB::table('estado__mexicos')->insert(['nombre' => 'Aguascalientes', 'desc' =>'AGS']);
DB::table('estado__mexicos')->insert(['nombre' => 'Baja California', 'desc' =>'BCN']);
DB::table('estado__mexicos')->insert(['nombre' => 'Baja California Sur', 'desc' =>'BCS']);
DB::table('estado__mexicos')->insert(['nombre' => 'Campeche', 'desc' =>'CAM']);
DB::table('estado__mexicos')->insert(['nombre' => 'Chiapas', 'desc' =>'CHP']);
DB::table('estado__mexicos')->insert(['nombre' => 'Chihuahua', 'desc' =>'CHI']);
DB::table('estado__mexicos')->insert(['nombre' => 'Ciudad de México', 'desc' =>'DIF']);
DB::table('estado__mexicos')->insert(['nombre' => 'Coahuila', 'desc' =>'COA']);
DB::table('estado__mexicos')->insert(['nombre' => 'Colima', 'desc' =>'COL']);
DB::table('estado__mexicos')->insert(['nombre' => 'Durango', 'desc' =>'DUR']);
DB::table('estado__mexicos')->insert(['nombre' => 'Guanajuato', 'desc' =>'GTO']);
DB::table('estado__mexicos')->insert(['nombre' => 'Guerrero', 'desc' =>'GRO']);
DB::table('estado__mexicos')->insert(['nombre' => 'Hidalgo', 'desc' =>'HGO']);
DB::table('estado__mexicos')->insert(['nombre' => 'Jalisco', 'desc' =>'JAL']);
DB::table('estado__mexicos')->insert(['nombre' => 'México', 'desc' =>'MEX']);
DB::table('estado__mexicos')->insert(['nombre' => 'Michoacán', 'desc' =>'MIC']);
DB::table('estado__mexicos')->insert(['nombre' => 'Morelos', 'desc' =>'MOR']);
DB::table('estado__mexicos')->insert(['nombre' => 'Nayarit', 'desc' =>'NAY']);
DB::table('estado__mexicos')->insert(['nombre' => 'Nuevo León', 'desc' =>'NLE']);
DB::table('estado__mexicos')->insert(['nombre' => 'Oaxaca', 'desc' =>'OAX']);
DB::table('estado__mexicos')->insert(['nombre' => 'Puebla', 'desc' =>'PUE']);
DB::table('estado__mexicos')->insert(['nombre' => 'Querétaro', 'desc' =>'QRO']);
DB::table('estado__mexicos')->insert(['nombre' => 'Quintana Roo', 'desc' =>'ROO']);
DB::table('estado__mexicos')->insert(['nombre' => 'San Luis Potosí', 'desc' =>'SLP']);
DB::table('estado__mexicos')->insert(['nombre' => 'Sinaloa', 'desc' =>'SIN']);
DB::table('estado__mexicos')->insert(['nombre' => 'Sonora', 'desc' =>'SON']);
DB::table('estado__mexicos')->insert(['nombre' => 'Tabasco', 'desc' =>'TAB']);
DB::table('estado__mexicos')->insert(['nombre' => 'Tamaulipas', 'desc' =>'TAM']);
DB::table('estado__mexicos')->insert(['nombre' => 'Tlaxcala', 'desc' =>'TLX']);
DB::table('estado__mexicos')->insert(['nombre' => 'Veracruz', 'desc' =>'VER']);
DB::table('estado__mexicos')->insert(['nombre' => 'Yucatán', 'desc' =>'YUC']);
DB::table('estado__mexicos')->insert(['nombre' => 'Zacatecas', 'desc' =>'ZAC']);

    }
}
