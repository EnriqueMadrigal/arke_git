<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTimeToUbicaciones extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
  public function up()
    {
         Schema::create('ubicacion__herramientas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_herramienta');
            $table->integer('id_obra');
            $table->integer('id_responsable');
            $table->dateTime('started_at')->nullable();
            $table->dateTime('ended_at')->nullable();
            $table->timestamps();
        });
        
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
