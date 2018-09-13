<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHerramientasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('herramientas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('clave')->default("");
            $table->string('desc')->default("");
            $table->string('modelo')->default("");
            $table->string('marca')->default("");
            $table->string('capacidad')->nullable();
            $table->integer('id_estadoequipo')->default(1);
            $table->integer('id_tipo')->default(1);
            $table->integer('cantidad')->default(1);
            $table->decimal('costo',8,2)->default(0.0);
            $table->date('supervisor')->nullable();
            $table->integer("id_obra")->default(1);
            $table->integer("id_responsable")->default(0);
              
            
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
        Schema::dropIfExists('herramientas');
    }
}
