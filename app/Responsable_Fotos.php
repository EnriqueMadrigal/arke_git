<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Responsable_Fotos extends Model
{
    //
      protected $table = 'responsable__fotos';
     protected $primaryKey = 'id';
   public $timestamps = false;
    
      protected $fillable = [
        'id_responsable', 'archivo','type','size',
    ];
}
