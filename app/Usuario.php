<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    //
    
     protected $table = 'usuarios';
     protected $primaryKey = 'id';
     public $timestamps = true;
    
      protected $fillable = [
        'nombre','apellidos','desc', 'tel','id_estado','id_permiso','username','password'
    ];
    
}

