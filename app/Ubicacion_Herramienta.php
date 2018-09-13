<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ubicacion_Herramienta extends Model
{
    //
    public $timestamps = true;
    
      protected $fillable = [
        'id_herramienta','id_obra','id_responsable', 'started_at','ended_at'
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
      
      public function herramienta()
    {
       // return $this->belongsTo('App\Obra', 'id_obra', 'id');
         return $this->hasOne('App\Herramienta', 'id', 'id_herramienta');
       
    }  
      
}

