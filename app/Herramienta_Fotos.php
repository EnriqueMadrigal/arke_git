<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Herramienta_Fotos extends Model
{
     protected $table = 'herramienta__fotos';
     protected $primaryKey = 'id';
     public $timestamps = false;
   
    
      protected $fillable = [
        'id_herramienta', 'archivo','type','size','title','description','id_usuario'
    ];
}
