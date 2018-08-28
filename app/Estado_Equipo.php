<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estado_Equipo extends Model
{
    //
      protected $table = 'estado__equipos';
     protected $primaryKey = 'id';
    
     
      protected $fillable = [
        'desc',
    ];
}
