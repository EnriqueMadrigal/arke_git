<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Herramienta;
use App\Herramienta_Fotos;
use App\Usuario;
use App\Estado_Equipo;
use App\Catalogo;
use App\Obra;
use App\Mantenimiento;
use App\Ubicacion_Herramienta;
use Session;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\HerramientaCreateRequest;
use Illuminate\Support\Facades\Auth;

class HerramientasController extends Controller
{
    
    public function __construct()
{
    $this->middleware('auth');
}
    
    public function index(Request $request)
    {
        
            $herramientas = Herramienta::orderBy('id', 'asc')->get();

            
            if ($request->has("orderByClave"))
            {
                $herramientas = Herramienta::orderBy('clave', 'asc')->get();
            }
            
            if ($request->has("orderByDesc"))
            {
                $herramientas = Herramienta::orderBy('desc', 'asc')->get();
            }
                
            if ($request->has("busqueda"))
            {
                
                $Busqueda = $request->get("busqueda");
                $herramientas = Herramienta::where('clave','like',"%".$Busqueda."%")->orderBy('clave', 'asc')->get();
                $herramientas2 = Herramienta::where('desc','like',"%".$Busqueda."%")->orderBy('desc', 'asc')->get();
                        
                        $herramientas = $herramientas->merge($herramientas2);
            }
            
    return view('herramientas', [
        'herramientas' => $herramientas
    ]);
        
        
    }
    
    public function deleteHerramienta($id)
    {
        
         $herramienta = Herramienta::find($id);
         $photos = Herramienta_Fotos::where('id_herramienta', $id)->get();
      
         foreach($photos as $photo)
         {
             
              $file_save_folder = "uploaded_folder".DIRECTORY_SEPARATOR."fotos_herramientas".DIRECTORY_SEPARATOR.$id.DIRECTORY_SEPARATOR.$photo->archivo;
      
                  $curPath = public_path($file_save_folder);
                                                                        
                        if (file_exists($curPath))
                        {
                            unlink($curPath);
                        }
        
             
         }
         
         
         
         $herramienta->delete();
         
         $deletedRows = Mantenimiento::where('id_herramienta', $id)->delete();
        $deletedRows = Ubicacion_Herramienta::where('id_herramienta', $id)->delete();
        $deletedRows = Herramienta_Fotos::where('id_herramienta', $id)->delete();
           
       
       
        
        
            return redirect('herramientas');
           

       
        
        
    }
    
       public function agregarHerramienta()
    {
          $estadosHerramienta = Estado_Equipo::all(['id', 'desc'])->pluck('desc', 'id');
          $catalogosHerramienta = Catalogo::all(['id', 'desc'])->pluck('desc', 'id');
          $ubicaciones = Obra::all(['id', 'desc'])->pluck('desc', 'id');
          //$responsables = Usuario::all(['id', 'nombre','apellidos'])->pluck('nombre', 'id');
          // DB::raw("concat(nombre, ' ','apellidos') as full_name"
          $responsables = Usuario::all(['id', DB::raw("concat(nombre, ' ',apellidos) as full_name")])->pluck('full_name', 'id');
          
       $ubicaciones = collect(['0' => 'Sin asignar'] + $ubicaciones->all());
       $responsables = collect(['0' => 'No asignado'] + $responsables->all());
       
          
                    
          
          
          //return view('debug',['datos'=>$ubicaciones]);
       return view('agregarHerramienta', ['catalogosHerramienta' => $catalogosHerramienta, 'estadosHerramienta' => $estadosHerramienta,'ubicaciones'=>$ubicaciones,'responsables'=>$responsables]);
    }
    
     
    
    
    
      public function agregar(HerramientaCreateRequest $request) 
    {
           //  return view("debug",['datos'=>$request]);
                 
         $herramienta = new Herramienta;
         
          $nueva_ubicacion = $request->get('id_obra');
          $nuevo_responsable = $request->get('id_responsable');
        $cantidad = $request->get('cantidad');
         
         $herramienta->clave = $request->get('clave');
         $herramienta->modelo = $request->get('modelo');
         $herramienta->marca = $request->get('marca');
         $herramienta->desc = $request->get('desc');
         $herramienta->capacidad = $request->get('capacidad');
         $herramienta->id_estadoequipo = $request->get('id_estadoequipo');
         $herramienta->id_tipo = $request->get('id_tipo');
         $herramienta->cantidad = $cantidad;
         $herramienta->costo = $request->get('costo');
         $herramienta->supervisor = $request->get('supervisor');
        // $herramienta->id_obra = $nueva_ubicacion;
         //$herramienta->id_responsable = $nuevo_responsable;
       
         if ($request->has("active"))
         {
             $herramienta->active=1;
         }
         
         else
         {
             $herramienta->active=0;
         }
         
          $herramienta->save();
         
           $new_id = $herramienta->id;
         ///////////
         
         //////// Guardar imagen si existe
  
  $curfile = $request->file('image');
   

  
  if ($curfile) 
  {
      $imageName = $curfile->getClientOriginalName();
      $filesize = $curfile->getSize();
      $filetype = $curfile->getMimeType();
      $file_extension = $curfile->getClientOriginalExtension();
      $newFileName = "photo-1.".$file_extension;
 

    $file_save_folder = "uploaded_folder".DIRECTORY_SEPARATOR."fotos_herramientas".DIRECTORY_SEPARATOR."$new_id".DIRECTORY_SEPARATOR;
      
                  $curPath = public_path($file_save_folder);
                                                                        
                        if (!file_exists($curPath))
                        {
                            
                        if (mkdir($curPath)){
                           
                        }
                        else {
                            Session::flash('error', 'No se agrego la fotografia'); 
                            return redirect('herramientas');
                        }
                        }
    
     // $curfile->move($curPath, $imageName);
                        $curfile->move($curPath, $newFileName);

                        
                          
                        
      $herramienta_foto = new Herramienta_Fotos;
      $herramienta_foto->id_herramienta = $new_id;
      $herramienta_foto->archivo = $newFileName;
      $herramienta_foto->type = $filetype;
      $herramienta_foto->size = $filesize;
      $herramienta_foto->save();
      
      
                  
              
            
            
  }
  
  
         for ($i = 1; $i <= $cantidad; $i++) {
    
          //Agregar el nuevo historial
          $nuevaUbicacion = new Ubicacion_Herramienta;
          
          $nuevaUbicacion->id_herramienta = $new_id;
          $nuevaUbicacion->id_obra = $nueva_ubicacion;
          $nuevaUbicacion->id_responsable = $nuevo_responsable;
          $nuevaUbicacion->started_at = Carbon::now();
          $nuevaUbicacion->no_equipo = $i;
          $nuevaUbicacion->save();
         }
  
         Session::flash('success', 'Datos Agregados correctamente');  
          return redirect('herramientas');
    }
    
    
      public function editHerramienta($id)
    {
        $herramienta = Herramienta::find($id);
        //$cur_foto = Herramienta_Fotos::where('id_herramienta', $id)->first();
        $photos = Herramienta_Fotos::where('id_herramienta', $id)->get();
        
        
        $estadosHerramienta = Estado_Equipo::all(['id', 'desc'])->pluck('desc', 'id');
          $catalogosHerramienta = Catalogo::all(['id', 'desc'])->pluck('desc', 'id');
         // $ubicaciones = Obra::all(['id', 'desc'])->pluck('desc', 'id');
         // $responsables = Responsable::all(['id', 'nombre'])->pluck('nombre', 'id');
        
          $date = \Carbon\Carbon::parse($herramienta->supervisor);

    $day = $date->day;
    $month = $date->month;
    $year = $date->year;
       
       
        
        
       /* 
        if($cur_foto === null){
    $file_save_folder = "";
    $curPath = "";
        }
        
        else {
            $file_save_folder = "uploaded_folder\\fotos_herramientas\\$id\\$cur_foto->archivo";
            
                 // $curPath = public_path($file_save_folder);
            $curPath = asset($file_save_folder);
        }
        
       */
      
                 
        
       
        return view('editarHerramienta', ['Herramienta'=>$herramienta, 'photos'=>$photos,'catalogosHerramienta' => $catalogosHerramienta, 'estadosHerramienta' => $estadosHerramienta, 'day'=>$day,'month'=>$month,'year'=>$year]);
   
       
    }
    
      public function modificar(HerramientaCreateRequest $request) 
    {
         $cur_id = $request->get('id');
          
           $herramienta = Herramienta::find($cur_id);
          
      
           
         $herramienta->clave = $request->get('clave');
         $herramienta->modelo = $request->get('modelo');
         $herramienta->marca = $request->get('marca');
         $herramienta->desc = $request->get('desc');
         $herramienta->capacidad = $request->get('capacidad');
         $herramienta->id_estadoequipo = $request->get('id_estadoequipo');
         $herramienta->id_tipo = $request->get('id_tipo');
         $herramienta->cantidad = $request->get('cantidad');
         $herramienta->costo = $request->get('costo');
         $herramienta->supervisor = $request->get('supervisor');
      
         
           if ($request->has("active"))
         {
             $herramienta->active=1;
         }
         
         else
         {
             $herramienta->active=0;
         }
         
       
          $herramienta->save();
   
              $curfile = $request->file('image');
          
          /// Imagen
          
           if ($curfile) 
  {
      $imageName = $curfile->getClientOriginalName();
      $filesize = $curfile->getSize();
      $filetype = $curfile->getMimeType();
 

    $file_save_folder = "uploaded_folder".DIRECTORY_SEPARATOR."fotos_herramientas".DIRECTORY_SEPARATOR."$cur_id".DIRECTORY_SEPARATOR;
      
                  $curPath = public_path($file_save_folder);
                                                                        
                   
    
     

      // Checa si ya tenia una foto
       $responsable_foto = Herramienta_Fotos::where('id_herramienta', $cur_id)->first();
        
        
        if ($responsable_foto === null){ // Si no tiene agregar nuevo registro
         $responsable_foto = new Herramienta_Fotos;
            
              if (!file_exists($curPath))
                        {
                            
                        if (mkdir($curPath)){
                           
                        }
                        else {
                            Session::flash('error', 'No se agrego la fotografia'); 
                            return redirect('herrami');
                        }
                        }
            
        }
            
        
        
        else { // Si ya tiene elimina la imagen actual
            $cur_file = $responsable_foto->archivo;
            ////
          
            $file_folder = "uploaded_folder".DIRECTORY_SEPARATOR."fotos_herramientas".DIRECTORY_SEPARATOR.$cur_id.DIRECTORY_SEPARATOR.$cur_file;
      
                  $curPath = public_path($file_folder);
                                                                        
                        if (!file_exists($curPath))
                        {
                            unlink($curPath);
                        }
            //////
            
            
            
        }
      
      $curfile->move($curPath, $imageName);
      $responsable_foto->id_herramienta = $cur_id;
      $responsable_foto->archivo = $imageName;
      $responsable_foto->type = $filetype;
      $responsable_foto->size = $filesize;
      $responsable_foto->save();
      
       
          
          ///
          
    }
    /*
         //Agregar al historial
             $lastUbicacion = Ubicacion_Herramienta::where('id_herramienta', $cur_id)->orderBy('id', 'desc')->first();
           
          if ($lastUbicacion) // Si existen
          {
              $lastUbicacion->ended_at = Carbon::now();
              $lastUbicacion->save();
          }
          
          //Agregar el nuevo
          $nuevaUbicacion = new Ubicacion_Herramienta;
          
          $nuevaUbicacion->id_herramienta = $cur_id;
          $nuevaUbicacion->id_obra = $nueva_ubicacion;
          $nuevaUbicacion->id_responsable = $nuevo_responsable;
          $nuevaUbicacion->started_at = Carbon::now();
          $nuevaUbicacion->save();
    */
    
     Session::flash('success', 'Datos Agregados correctamente');  
          return redirect('herramientas');
    }
    
    
        public function agregarImagen(Request $request) 
    {
             $cur_id = $request->get('id');
             $title = $request->get('title');
             $description = $request->get('description');
            
                           
               $curfile = $request->file('image');
   
  
  
  if ($curfile) 
  {
      
      $photos = Herramienta_Fotos::where('id_herramienta', $cur_id)->get();
      $curNum = count($photos) + 1;
      
      $imageName = $curfile->getClientOriginalName();
      $filesize = $curfile->getSize();
      $filetype = $curfile->getMimeType();
      $file_extension = $curfile->getClientOriginalExtension();
      $newFileName = "photo-".$curNum.".".$file_extension;
 

    $file_save_folder = "uploaded_folder".DIRECTORY_SEPARATOR."fotos_herramientas".DIRECTORY_SEPARATOR.$cur_id.DIRECTORY_SEPARATOR;
      
                  $curPath = public_path($file_save_folder);
                                                                        
                        if (!file_exists($curPath))
                        {
                            
                        if (mkdir($curPath)){
                           
                        }
                        else {
                            Session::flash('error', 'No se agrego la fotografia'); 
                            return redirect('herramientas');
                        }
                        }
    
     // $curfile->move($curPath, $imageName);
                        $curfile->move($curPath, $newFileName);

      $herramienta_foto = new Herramienta_Fotos;
      $herramienta_foto->id_herramienta=$cur_id;
      $herramienta_foto->archivo = $newFileName;
      $herramienta_foto->type = $filetype;
      $herramienta_foto->size = $filesize;
      $herramienta_foto->title = $title;
      $herramienta_foto->description = $description;
      $herramienta_foto->id_usuario = Auth::user()->id_usuario;
      
      $herramienta_foto->save();
      
      
           
              
            
            
  }
  
         
         return redirect()->to('editHerramienta/'.$cur_id);      
            
    }
    
}
