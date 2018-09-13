<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Herramienta_Fotos extends Model
{
     protected $table = 'herramienta__fotos';
     protected $primaryKey = 'id';
     public $timestamps = false;
   
    
      protected $fillable = [
        'id_responsable', 'archivo','type','size','title','description'
    ];
}
