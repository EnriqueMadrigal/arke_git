<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mantenimiento extends Model
{
    //
     protected $table = 'mantenimientos';
     protected $primaryKey = 'id';
    public $timestamps = true;
    
      protected $fillable = [
        'desc','id_herramienta','started_at'
    ];
      
}
