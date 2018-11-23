<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Catalogo;
use App\Http\Resources\CatalogoAppResource;

class AppCatalogoController extends Controller
{
    //
    
      public function __construct()
    {
      $this->middleware('auth:api')->except(['catalogos', 'show']);
    }
    
    
    public function catalogos(Request $request)
    {
        
         $catalogos = Catalogo::orderBy('id', 'asc')->get();
        
        
         $collection = array();
         $curPath = "";
         
         foreach ($catalogos as $catalogo)
         {
              $catalogos_array = array();
             $catalogos_array['id'] = $catalogo->id;
             $catalogos_array['desc'] = $catalogo->desc;
             
            
              $curArhivo = $catalogo->Foto;
             
              if ($curArhivo)
              {
                    $file_save_folder = "uploaded_folder"."/"."fotos_catalogo"."/".$catalogo->id."/".$curArhivo->archivo;
            
             $curPath = asset($file_save_folder);
       
                  
              }
              
              //$catalogos_array['image'] = json_encode($curPath , JSON_UNESCAPED_SLASHES);
              $catalogos_array['image'] = $curPath;
              
              
              $collection[] = $catalogos_array;
             
         }
         
       return response()->json([
            'error' => 0,
            //'message' => $user->toArray()
          'message' => $collection
        ]);
    }
    // 'message' => new UserAppResource($user)
}
