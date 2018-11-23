<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ubicacion_Herramienta extends Model
{
    //
    public $timestamps = true;
      protected $table = 'ubicacion__herramientas';
    
      protected $fillable = [
        'id_herramienta','id_obra','id_responsable', 'started_at','ended_at','id_usuario','no_equipo'
    ];
      
      
        public function obra()
    {
       // return $this->belongsTo('App\Obra', 'id_obra', 'id');
         return $this->hasOne('App\Obra', 'id', 'id_obra');
       
    }  
      
     public function responsable()
    {
       // return $this->belongsTo('App\Obra', 'id_obra', 'id');
         return $this->hasOne('App\Usuario', 'id', 'id_responsable');
       
    }  
      
      public function herramienta()
    {
       // return $this->belongsTo('App\Obra', 'id_obra', 'id');
         return $this->hasOne('App\Herramienta', 'id', 'id_herramienta');
       
    }  
      
        public function usuario()
    {
       // return $this->belongsTo('App\Obra', 'id_obra', 'id');
         return $this->hasOne('App\User', 'id', 'id_usuario');
       
    }  
    
    
}

