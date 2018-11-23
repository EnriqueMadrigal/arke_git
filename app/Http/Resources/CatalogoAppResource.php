<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class CatalogoAppResource extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        
        $curArhivo = $this->Foto->archivo;
      $curPath = "";
        if (strlen($curArhivo)>1)
        {
         $file_save_folder = "uploaded_folder".DIRECTORY_SEPARATOR."fotos_catalogo".DIRECTORY_SEPARATOR.$this->id.DIRECTORY_SEPARATOR.$curArhivo;
            
                 // $curPath = public_path($file_save_folder);
            $curPath = asset($file_save_folder);
            
            
            
        }
        
        
        return [
         'id' => $this->id,
        'desc' => $this->desc,
            'link' => $curPath
        
      ];
    }
}
