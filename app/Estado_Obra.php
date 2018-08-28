<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estado_Obra extends Model
{
    //
        protected $table = 'estado_obras';
     protected $primaryKey = 'id';
    
     
      protected $fillable = [
        'desc',
    ];
}
