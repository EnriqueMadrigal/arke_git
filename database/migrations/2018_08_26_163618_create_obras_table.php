<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateObrasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('obras', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->string('desc');
            $table->string('calle');
            $table->string('numero_ext');
            $table->string('numero_int');
            $table->string('colonia');
            $table->string('municipio');
            $table->string('tel1');
            $table->string('tel2');
            $table->string('tel3');
            $table->string('contacto');
            $table->integer('id_estado');
            $table->integer('id_estado_mex');
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
        Schema::dropIfExists('obras');
    }
}
