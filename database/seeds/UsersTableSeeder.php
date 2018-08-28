<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //'name', 'email', 'password','username','ative', 'type'
        DB::table('users')->delete();
        DB::table('users')->insert(['name' => 'Administrador','email' => 'admin@admin.com','username' => 'admin' ,'password' => bcrypt('administrador2018'),'active' => '1', 'type' => '1']);
       
    }
}
