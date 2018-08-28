<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estado_Mexico extends Model
{
    //
       protected $table = 'estado__mexicos';
     protected $primaryKey = 'id';
    
     
      protected $fillable = [
        'nombre', 'desc',
    ];
     
}
