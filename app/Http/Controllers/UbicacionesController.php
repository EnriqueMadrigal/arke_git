<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Herramienta;
use App\Obra;
use App\Usuario;
use App\Ubicacion_Herramienta;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UbicacionesController extends Controller
{
    //
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
            
           
           
      
            
    return view('ubicaciones', [
        'herramientas' => $herramientas
    ]);
        
        
    }
    
     public function verHistorial($id)
    {
         
         $partes = explode("-", $id);
         
         if (count($partes)==0)
         {
         return null;    
         }
         
         $cur_id = $partes[0];
         $cur_num = $partes[1];
        
         $matches = ['id_herramienta' => $cur_id,'no_equipo' => $cur_num];
           $ubicaciones = Ubicacion_Herramienta::where($matches)->orderBy('id', 'asc')->get();
           $herramienta = Herramienta::find($cur_id);  
      
      
            
    return view('verHistorial', [
        'ubicaciones' => $ubicaciones, 'herramienta' => $herramienta, 'numEquipo' => $cur_num
    ]);
        
        
    }
    
   
    
    
     public function verDetalleHistorial($id)
    {
        
           $ubicaciones = Ubicacion_Herramienta::where('id_herramienta', $id)->orderBy('id', 'asc')->get();
           $herramienta = Herramienta::find($id);  
      
      
            
    return view('verHistorial', [
        'ubicaciones' => $ubicaciones, 'herramienta' => $herramienta
    ]);
        
        
    }
    
    public function verEquipos($id)
    {
        
           //$ubicaciones = Ubicacion_Herramienta::where('id_herramienta', $id)->orderBy('id', 'asc')->get();
           $herramienta = Herramienta::find($id);  
      
      
            
    return view('verEquipos', [
        'herramienta' => $herramienta
    ]);
        
        
    }
    
    
      public function cambiarHerramienta($id)
    {
          
            $partes = explode("-", $id);
         
         if (count($partes)==0)
         {
         return null;    
         }
         
         $cur_id = $partes[0];
         $cur_num = $partes[1];
        
         $herramienta = Herramienta::find($cur_id);  
          
          
         $ubicaciones = Obra::all(['id', 'desc'])->pluck('desc', 'id');
            $ubicaciones = collect(['0' => 'Sin asignar'] + $ubicaciones->all());
      
          //$responsables = Responsable::all(['id', 'nombre'])->pluck('nombre', 'id');
          $responsables = Usuario::all(['id', DB::raw("concat(nombre, ' ',apellidos) as full_name")])->pluck('full_name', 'id');
       $responsables = collect(['0' => 'Sin asignar'] + $responsables->all());
       
        return view('cambiarHerramienta', ['herramienta'=>$herramienta, 'ubicaciones'=>$ubicaciones,'responsables'=>$responsables, 'numEquipo'=>$cur_num]);
    }
    
    
    
      public function cambiar(Request $request) 
    {
         $cur_id = $request->get('id');
         $no_equipo = $request->get('no_equipo');
          
          // $herramienta = Herramienta::find($cur_id);
          
           $nueva_ubicacion = $request->get('id_obra');
           $nuevo_responsable = $request->get('id_responsable');
           
           $curFecha = $request->get('fecha');
      
        //  $herramienta->id_obra = $nueva_ubicacion;
        // $herramienta->id_responsable = $nuevo_responsable;
         
    
       
        //  $herramienta->save();
   
           //Agregar al historial
          $matches = ['id_herramienta' => $cur_id,'no_equipo' => $no_equipo];
             $lastUbicacion = Ubicacion_Herramienta::where($matches)->orderBy('id', 'desc')->first();
           
          if ($lastUbicacion) // Si existe
          {
              //$lastUbicacion->ended_at = Carbon::now();
              $lastUbicacion->ended_at = Carbon::parse($curFecha);
            

              $lastUbicacion->save();
          }
          
          //Agregar el nuevo
          $nuevaUbicacion = new Ubicacion_Herramienta;
          
          $nuevaUbicacion->id_herramienta = $cur_id;
          $nuevaUbicacion->id_obra = $nueva_ubicacion;
          $nuevaUbicacion->id_responsable = $nuevo_responsable;
          $nuevaUbicacion->started_at = Carbon::parse($curFecha);
          $nuevaUbicacion->id_usuario =  Auth::user()->id_usuario; // Administrador
          $nuevaUbicacion->no_equipo = $no_equipo;
          $nuevaUbicacion->save();
          
           return redirect()->to('verEquipos/'.$cur_id);   
         // return redirect('ubicaciones');
    }
    
}
