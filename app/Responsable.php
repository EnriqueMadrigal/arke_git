<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Responsable extends Model
{
    //
     protected $table = 'responsables';
     protected $primaryKey = 'id';
    public $timestamps = true;
    
      protected $fillable = [
        'nombre', 'apellidos','desc','tel' ,'id_photo',
    ];
}
