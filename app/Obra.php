<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Obra extends Model
{
    //
    
        protected $table = 'obras';
     protected $primaryKey = 'id';
    public $timestamps = true;
    
     
      protected $fillable = [
        'nombre', 'desc','calle' ,'numero_ext', 'numero_int','colonia','municipio','tel1','tel2','tel3','contacto','id_estado','id_estado_mex',
    ];
}
