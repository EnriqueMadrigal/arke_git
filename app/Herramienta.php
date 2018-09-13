<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Herramienta extends Model
{
      protected $table = 'herramientas';
     protected $primaryKey = 'id';
    public $timestamps = true;
    
      protected $fillable = [
        'clave', 'desc','modelo' ,'marca','capacidad','id_estadoequipo','id_tipo','cantidad','costo','supervisor','id_obra','id_responsable'
    ];
      
      
      public function obra()
    {
       // return $this->belongsTo('App\Obra', 'id_obra', 'id');
         return $this->hasOne('App\Obra', 'id', 'id_obra');
       
    }  
      
     public function responsable()
    {
       // return $this->belongsTo('App\Obra', 'id_obra', 'id');
         return $this->hasOne('App\Responsable', 'id', 'id_responsable');
       
    }  
      
}

