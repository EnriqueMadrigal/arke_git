<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Herramienta;
use App\Mantenimiento;
use App\Obra;
use App\Usuario;
use App\Ubicacion_Herramienta;
use App\Herramienta_Fotos;
use Image;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class AppHerramientasController extends Controller
{
    //
      public function __construct()
    {
      $this->middleware('auth:api')->except(['getHerramientaTipo','getHerramientaObra','getHerramientaBusqueda','getHerramientaResponsable' ,'getHerramienta', 'getImage','getImageId','getImageSmall','obras','responsables','actualizarUbicacion','getEquipos','agregarImagen','show']);
    }
    
    
      public function getHerramientaTipo(Request $request)
    {
        
       
           $cat_id = $request->route('id'); 
          
          
         $herramientas = Herramienta::where('id_tipo', $cat_id)->get();
         
         $collection = array();
         
         $curUbicacion = "";
         
         foreach ($herramientas as $herramienta)
         {
             $herramientas_array = array();
             $herramientas_array['id'] = $herramienta->id;
             $herramientas_array['clave'] = $herramienta->clave;
             $herramientas_array['desc'] = $herramienta->desc;
             
            
             $curPath = "";    
              $curArhivo = $herramienta->Foto;
             
              
             
              if ($curArhivo)
              {
             //$file_save_folder = "uploaded_folder"."/"."fotos_herramientas"."/".$herramienta->id."/".$curArhivo->archivo;
            $file_save_folder = "api/getImageHerramientaSmall/".$herramienta->id;
             $curPath = asset($file_save_folder);
       
                  
              }
              
             
              $herramientas_array['image'] = $curPath;
              $collection[] = $herramientas_array;
             
         }
         
       return response()->json([
            'error' => 0,
            //'message' => $user->toArray()
          'message' => $collection
        ]);
         
         
    }
    
      public function getHerramientaBusqueda(Request $request)
    {
        
       
           $Busqueda = $request->route('id'); 
          
           
                $herramientas = Herramienta::where('clave','like',"%".$Busqueda."%")->orderBy('clave', 'asc')->get();
                $herramientas2 = Herramienta::where('desc','like',"%".$Busqueda."%")->orderBy('desc', 'asc')->get();
                        
               $herramientas = $herramientas->merge($herramientas2);
          
         
         
         
         $collection = array();
         
         $curUbicacion = "";
         
         foreach ($herramientas as $herramienta)
         {
             $herramientas_array = array();
             $herramientas_array['id'] = $herramienta->id;
             $herramientas_array['clave'] = $herramienta->clave;
             $herramientas_array['desc'] = $herramienta->desc;
             
            
             $curPath = "";    
              $curArhivo = $herramienta->Foto;
             
              
             
              if ($curArhivo)
              {
             //$file_save_folder = "uploaded_folder"."/"."fotos_herramientas"."/".$herramienta->id."/".$curArhivo->archivo;
            $file_save_folder = "api/getImageHerramientaSmall/".$herramienta->id;
             $curPath = asset($file_save_folder);
       
                  
              }
              
             
              $herramientas_array['image'] = $curPath;
              $collection[] = $herramientas_array;
             
         }
         
       return response()->json([
            'error' => 0,
            //'message' => $user->toArray()
          'message' => $collection
        ]);
         
         
    }
   
    
       public function getHerramientaObra(Request $request)
    {
        
       
           $id_obra = $request->route('id'); 
           $order = "clave";
          
          
        // $herramientas = Herramienta::where('id_tipo', $cat_id)->get();
          $herramientas = Herramienta::orderBy($order, 'asc')->get();
         
         
         $collection = array();
         
         $curUbicacion = "";
         
         foreach ($herramientas as $herramienta)
         {
             
              $curUbicaciones = $herramienta->hasUbicaciones($id_obra);
                         if (count($curUbicaciones) == 0){
                         continue;
                         }
             
             
             $herramientas_array = array();
             $herramientas_array['id'] = $herramienta->id;
             $herramientas_array['clave'] = $herramienta->clave;
             $herramientas_array['desc'] = $herramienta->desc;
             
            
             $curPath = "";    
              $curArhivo = $herramienta->Foto;
             
              
             
              if ($curArhivo)
              {
             //$file_save_folder = "uploaded_folder"."/"."fotos_herramientas"."/".$herramienta->id."/".$curArhivo->archivo;
            $file_save_folder = "api/getImageHerramientaSmall/".$herramienta->id;
             $curPath = asset($file_save_folder);
       
                  
              }
              
             
              $herramientas_array['image'] = $curPath;
              $collection[] = $herramientas_array;
             
         }
         
       return response()->json([
            'error' => 0,
            //'message' => $user->toArray()
          'message' => $collection
        ]);
         
         
    }
    
      public function getHerramientaResponsable(Request $request)
    {
        
       
           $id_responsable = $request->route('id'); 
           $order = "clave";
          
          
        // $herramientas = Herramienta::where('id_tipo', $cat_id)->get();
          $herramientas = Herramienta::orderBy($order, 'asc')->get();
         
         
         $collection = array();
         
         $curUbicacion = "";
         
         foreach ($herramientas as $herramienta)
         {
             
                    $curUbicaciones = $herramienta->hasResponsables($id_responsable);
                         if (count($curUbicaciones) == 0){
                         continue;
                         }
                     
             
             $herramientas_array = array();
             $herramientas_array['id'] = $herramienta->id;
             $herramientas_array['clave'] = $herramienta->clave;
             $herramientas_array['desc'] = $herramienta->desc;
             
            
             $curPath = "";    
              $curArhivo = $herramienta->Foto;
             
              
             
              if ($curArhivo)
              {
             //$file_save_folder = "uploaded_folder"."/"."fotos_herramientas"."/".$herramienta->id."/".$curArhivo->archivo;
            $file_save_folder = "api/getImageHerramientaSmall/".$herramienta->id;
             $curPath = asset($file_save_folder);
       
                  
              }
              
             
              $herramientas_array['image'] = $curPath;
              $collection[] = $herramientas_array;
             
         }
         
       return response()->json([
            'error' => 0,
            //'message' => $user->toArray()
          'message' => $collection
        ]);
         
         
    }
    
    
    public function getHerramienta(Request $request)
    {
        
          $cur_id = $request->route('id'); 
          
           $herramienta = Herramienta::find($cur_id);
           $mantenimientos = Mantenimiento::where('id_herramienta', $cur_id)->orderBy('id', 'asc')->get();
           $photos = Herramienta_Fotos::where('id_herramienta', $cur_id)->orderBy('id', 'asc')->get();
           
           

         $curPath = "";
         $curUbicacion = "";
         $curResponsable = "";
         
             $herramientas_array = array();
             $herramientas_array['id'] = $herramienta->id;
             $herramientas_array['clave'] = $herramienta->clave;
             $herramientas_array['marca'] = $herramienta->marca;
             $herramientas_array['modelo'] = $herramienta->modelo;
             
             $herramientas_array['desc'] = $herramienta->desc;
             
             
             
            
              $curObra = $herramienta->Obra;
              $curArhivo = $herramienta->Foto;
              $Responsable = $herramienta->getResponsable(1);
             
              if ($Responsable)
              {
                  $curResponsable = $Responsable->nombre. " ". $Responsable->apellidos;
              }
              
              
              if($curObra){
                  $curUbicacion = $curObra->nombre;
                  
              }
              
              
             
              if ($curArhivo)
              {
             //$file_save_folder = "uploaded_folder"."/"."fotos_herramientas"."/".$herramienta->id."/".$curArhivo->archivo;
             $file_save_folder = "api/getImageHerramienta/".$herramienta->id;
           
             $curPath = asset($file_save_folder);
       
                  
              }
              
             
              $herramientas_array['image'] = $curPath;
              $herramientas_array['ubicacion'] = $curUbicacion;
              $herramientas_array['responsable'] = $curResponsable;
             
              $mantenimientos_array = array();
              
                 foreach ($mantenimientos as $mantenimiento)
         {
            $curMantenimiento = array();
            $curMantenimiento['fecha'] = $mantenimiento->started_at;
            $curMantenimiento['desc'] = $mantenimiento->desc;
            
            
            $mantenimientos_array[] = $curMantenimiento;
         }
                 
         $herramientas_array['mantenimientos'] = $mantenimientos_array; 
         
         $images_array = array();
         
         foreach ($photos as $photo)
         {
             $curPhoto = array();
       
              $file_save_folder = "api/getImageHerramientaId/".$photo->id;
              $curPath = asset($file_save_folder);
       $images_array[] = $curPath;
             
         }
         $herramientas_array['images'] = $images_array;
         
       return response()->json([
            'error' => 0,
            //'message' => $user->toArray()
          'message' => $herramientas_array
        ]);
         
         
        
    }
    
    public function getImage(Request $request)
    {
        
          $cur_id = $request->route('id'); 
          
           $herramienta = Herramienta::find($cur_id);
           
           $curArhivo = $herramienta->Foto;
              
              
           
           
           
             
              if ($curArhivo)
              {
             //$file_save_folder = "uploaded_folder"."/"."fotos_herramientas"."/".$herramienta->id."/".$curArhivo->archivo;
        
                  $archivo = $curArhivo->archivo;
              $file_save_folder = "uploaded_folder".DIRECTORY_SEPARATOR."fotos_herramientas".DIRECTORY_SEPARATOR.$cur_id.DIRECTORY_SEPARATOR.$archivo;
             $curPath = public_path($file_save_folder);
              if (file_exists($curPath))
            {
             //return Image::make($curPath)->resize(480,480)->response();
                  return Image::make($curPath)->response();
                       
         
            }
             
             
              }
              
           
    }
    
    
    
     public function getImageId(Request $request)
    {
        
          $cur_id = $request->route('id'); 
          
           $curArhivo = Herramienta_Fotos::find($cur_id);
           
          
           
             
              if ($curArhivo)
              {
             //$file_save_folder = "uploaded_folder"."/"."fotos_herramientas"."/".$herramienta->id."/".$curArhivo->archivo;
                  $id_herramienta = $curArhivo->id_herramienta;
                  $archivo = $curArhivo->archivo;
              $file_save_folder = "uploaded_folder".DIRECTORY_SEPARATOR."fotos_herramientas".DIRECTORY_SEPARATOR.$id_herramienta.DIRECTORY_SEPARATOR.$archivo;
             $curPath = public_path($file_save_folder);
              if (file_exists($curPath))
            {
             return Image::make($curPath)->resize(256,256)->response();
                       
         
            }
             
             
              }
              
           
    }
    
    
    
    
     public function getImageSmall($id)
    {
        
          //$cur_id = $request->route('id'); 
          $cur_id = $id;
           $herramienta = Herramienta::find($cur_id);
           
           $curArhivo = $herramienta->Foto;
              
              
           
           
           
             
              if ($curArhivo)
              {
             //$file_save_folder = "uploaded_folder"."/"."fotos_herramientas"."/".$herramienta->id."/".$curArhivo->archivo;
        
                  $archivo = $curArhivo->archivo;
              $file_save_folder = "uploaded_folder".DIRECTORY_SEPARATOR."fotos_herramientas".DIRECTORY_SEPARATOR.$cur_id.DIRECTORY_SEPARATOR.$archivo;
             $curPath = public_path($file_save_folder);
              if (file_exists($curPath))
            {
             return Image::make($curPath)->resize(80,80)->response();
                       
         
            }
             
             
              }
              
           
    }
    
    
     public function obras(Request $request)
    {
        
         $obras = Obra::orderBy('id', 'asc')->get();
        
        
         $collection = array();
         
         foreach ($obras as $obra)
         {
              $catalogos_array = array();
             $catalogos_array['id'] = $obra->id;
             $catalogos_array['nombre'] = $obra->nombre;
              $catalogos_array['desc'] = $obra->desc;
             
            
              
              
              $collection[] = $catalogos_array;
             
         }
         
       return response()->json([
            'error' => 0,
            //'message' => $user->toArray()
          'message' => $collection
        ]);
    }
    
    
     public function responsables(Request $request)
    {
        
         $responsables = Usuario::orderBy('id', 'asc')->get();
        
        
         $collection = array();
         
         foreach ($responsables as $responsable)
         {
              $catalogos_array = array();
             $catalogos_array['id'] = $responsable->id;
             $catalogos_array['nombre'] = $responsable->nombre." ".$responsable->apellidos;
              $catalogos_array['desc'] = $responsable->desc;
             
            
              
              
              $collection[] = $catalogos_array;
             
         }
         
       return response()->json([
            'error' => 0,
            //'message' => $user->toArray()
          'message' => $collection
        ]);
    }
    
    
    public function actualizarUbicacion(Request $request)
    {
        $cur_id = $request->get('id_herramienta');
          
           //$herramienta = Herramienta::find($cur_id);
          
           $nueva_ubicacion = $request->get('id_obra');
           $nuevo_responsable = $request->get('id_responsable');
           $id_usuario = $request->get('id_usuario');
           $no_equipo = $request->get('no_equipo');
           $user_pass = $request->get('user_pass');
           
           $curFecha = Carbon::now();
      
         // $herramienta->id_obra = $nueva_ubicacion;
         //$herramienta->id_responsable = $nuevo_responsable;
         
           
            $user = Usuario::find($nuevo_responsable);
          
       
          
          if ($user != NULL ) 
          {
            // Usuario si existe
        
              ///////////
           
               $curPassword = $user->password;  
          
          if (!Hash::check($user_pass, $curPassword))
        {
      return response()->json([
            'error' => 1,
            //'message' => $user->toArray()
          'message' => 'Contraseña Invalida'
        ]);
              
        }            
           
          }   
    
       
          //$herramienta->save();
   
           //Agregar al historial
           $matches = ['id_herramienta'=>$cur_id, 'no_equipo'=>$no_equipo];
             $lastUbicacion = Ubicacion_Herramienta::where($matches)->orderBy('id', 'desc')->first();
           
          if ($lastUbicacion) // Si existen
          {
              //$lastUbicacion->ended_at = Carbon::now();
              $lastUbicacion->ended_at = Carbon::now();

              $lastUbicacion->save();
          }
          
          //Agregar el nuevo
          $nuevaUbicacion = new Ubicacion_Herramienta;
          
          $nuevaUbicacion->id_herramienta = $cur_id;
          $nuevaUbicacion->id_obra = $nueva_ubicacion;
          $nuevaUbicacion->id_responsable = $nuevo_responsable;
          $nuevaUbicacion->started_at = Carbon::now();
          $nuevaUbicacion->id_usuario = $id_usuario; // Administrador
          $nuevaUbicacion->no_equipo = $no_equipo;
          $nuevaUbicacion->save();
                  
          return response()->json([
            'error' => 0,
            //'message' => $user->toArray()
          'message' => "Actualización exitosa"
        ]);
         
        
        
    }
    
      public function getEquipos(Request $request)
    {
        
          $cur_id = $request->route('id');
          $herramienta = Herramienta::find($cur_id);
         $cantidad = $herramienta->cantidad;
         
        $collection = array(); 
         for ($i = 1; $i <= $herramienta->cantidad; $i++)
         {
           $ubicaciones_array = array();  
           $curResponable = $herramienta->GetResponsable($i);
           
           $ubicaciones_array['id'] = $i;
           $ubicaciones_array['num_equipo'] = $i;
           $ubicaciones_array['ubicacion_actual'] = $herramienta->getObra($i)->nombre;
           $ubicaciones_array['responsable'] = $curResponable->nombre." ".$curResponable->apellidos;
          
           $collection[] = $ubicaciones_array;
         }
         
          
           
           return response()->json([
            'error' => 0,
            //'message' => $user->toArray()
          'message' => $collection
        ]);   
              
      
   
    }
    
    public function agregarImagen(Request $request)
    {
        
date_default_timezone_set('America/Mexico_City');

        $cur_id = $request->get('id_herramienta');
        $id_usuario = $request->get('id_usuario');
        $curImage = $request->get('image_64');
        
        
        
        ////////////
        
        $file_save_folder = "uploaded_folder".DIRECTORY_SEPARATOR."fotos_herramientas".DIRECTORY_SEPARATOR.$cur_id.DIRECTORY_SEPARATOR;
      
                  $curPath = public_path($file_save_folder);
                                                                        
                        if (!file_exists($curPath))
                        {
                            
                        if (mkdir($curPath)){
                           
                        }
                        else {
                            return response()->json([
            'error' => 1,
            //'message' => $user->toArray()
          'message' => 'No se pudo crear el directorio'
        ]);  
         
                            
                        }
                        }
    
   
    $newFileName =  'mobile_'.date("His").date("j-n-Y").'.jpg';  
    $curFile = $curPath.$newFileName;                    
    
    
     
    
    
  //  $img = imagecreatefromstring(base64_decode($curImage));
  //  imagejpeg($img, "/path/to/file" . $curFile);
    
    $img = Image::make(base64_decode($curImage));

    $img->save($curFile);
    
    
    
      $herramienta_foto = new Herramienta_Fotos;
      $herramienta_foto->id_herramienta=$cur_id;
      $herramienta_foto->archivo = $newFileName;
      $herramienta_foto->type = mime_content_type($curFile);
      $herramienta_foto->size = filesize($curFile);
      $herramienta_foto->title = date("j-n-Y-His");
      $herramienta_foto->description = "subido desde el celular";
      $herramienta_foto->id_usuario = $id_usuario;
      
      $herramienta_foto->save();
    
        
        ///////////
        
        
         return response()->json([
            'error' => 0,
            //'message' => $user->toArray()
          'message' => 'Imagen subida con exito'
        ]);  
        
        
    }
    
}
