<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Catalogo extends Model
{
 
 protected $table = 'catalogos';    
//
    protected $fillable = [
        'desc'
    ];

    
        public function Foto()
    {
       // return $this->belongsTo('App\Obra', 'id_obra', 'id');
         return $this->hasOne('App\Catalogo_fotos', 'id_catalogo', 'id');
       
    }  
    
}
