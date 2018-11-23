<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Catalogo_fotos extends Model
{
    //
     protected $table = 'catalogo_fotos';
     protected $primaryKey = 'id';
   public $timestamps = false;
    
      protected $fillable = [
        'id_catalogo', 'archivo','type','size'
    ];
}
