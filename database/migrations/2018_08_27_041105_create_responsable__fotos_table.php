<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResponsableFotosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('responsable__fotos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_responsable');
            $table->string('archivo');
            $table->string('type');
            $table->integer('size');
                        
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('responsable__fotos');
    }
}
