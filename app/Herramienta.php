<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Herramienta extends Model
{
      protected $table = 'herramientas';
     protected $primaryKey = 'id';
    public $timestamps = true;
    
      protected $fillable = [
        'clave', 'desc','modelo' ,'marca','capacidad','id_estadoequipo','id_tipo','cantidad','costo','supervisor'
    ];
}

