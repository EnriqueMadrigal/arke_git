<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class UserAppResource extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        //return parent::toArray($request);
        return [
         'id' => $this->id,
        'nombre' => $this->nombre,
        'apellidos' => $this->apellidos,
        'description' => $this->desc,
        'created_at' => (string) $this->created_at,
        'updated_at' => (string) $this->updated_at,
        'permiso' => $this->id_permiso,
         'estado' => $this->id_estado,
        
      ];
        
        
    }
}
