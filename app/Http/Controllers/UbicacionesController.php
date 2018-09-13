<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Herramienta;
use App\Obra;
use App\Responsable;
use App\Ubicacion_Herramienta;
use Carbon\Carbon;

class UbicacionesController extends Controller
{
    //
    
     public function index()
    {
        
           $herramientas = Herramienta::orderBy('id', 'asc')->get();
         //$herramientas = Herramienta::orderBy('id', 'asc')->obra;
        // $herramientas = Herramienta::find(1)->obra;
         $obras = Obra::orderBy('id', 'asc')->get();
         $responsables = Responsable::orderBy('id', 'asc')->get();
            
      
      
            
    return view('ubicaciones', [
        'herramientas' => $herramientas
    ]);
        
        
    }
    
    
     public function verHistorial($id)
    {
        
           $ubicaciones = Ubicacion_Herramienta::where('id_herramienta', $id)->orderBy('id', 'asc')->get();
           $herramienta = Herramienta::find($id);  
      
      
            
    return view('verHistorial', [
        'ubicaciones' => $ubicaciones, 'herramienta' => $herramienta
    ]);
        
        
    }
    
    
    
    
      public function cambiarHerramienta($id)
    {
        $herramienta = Herramienta::find($id);
         $ubicaciones = Obra::all(['id', 'desc'])->pluck('desc', 'id');
          $responsables = Responsable::all(['id', 'nombre'])->pluck('nombre', 'id');
        
       
        return view('cambiarHerramienta', ['Herramienta'=>$herramienta, 'ubicaciones'=>$ubicaciones,'responsables'=>$responsables]);
    }
    
    
    
      public function cambiar(Request $request) 
    {
         $cur_id = $request->get('id');
          
           $herramienta = Herramienta::find($cur_id);
          
           $nueva_ubicacion = $request->get('id_obra');
           $nuevo_responsable = $request->get('id_responsable');
           
           $curFecha = $request->get('fecha');
      
          $herramienta->id_obra = $nueva_ubicacion;
         $herramienta->id_responsable = $nuevo_responsable;
         
    
       
          $herramienta->save();
   
           //Agregar al historial
             $lastUbicacion = Ubicacion_Herramienta::where('id_herramienta', $cur_id)->orderBy('id', 'desc')->first();
           
          if ($lastUbicacion) // Si existen
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
          $nuevaUbicacion->save();
                  
          return redirect('ubicaciones');
    }
    
}
