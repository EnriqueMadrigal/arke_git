<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Herramienta;
use App\Mantenimiento;
class MantenimientosController extends Controller
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
            
             
             
            
    return view('mantenimientos', [
        'herramientas' => $herramientas
    ]);
        
        
    }     
    
    
    public function verMantenimientos($id)
    {
     
          $mantenimientos = Mantenimiento::where('id_herramienta', $id)->orderBy('id', 'asc')->get();
           $herramienta = Herramienta::find($id);  
      
      
            
    return view('verMantenimientos', [
        'mantenimientos' => $mantenimientos, 'herramienta' => $herramienta
    ]);
        
        
        
    }
    
    public function agregarMantenimiento($id)
    {
       $herramienta = Herramienta::find($id);
        
       
        return view('agregarMantenimiento', ['Herramienta'=>$herramienta]);
  
        
    }
    
    public function agregarMan(Request $request)
    {
        
           $mantenimiento = new Mantenimiento;
           $mantenimiento->id_herramienta = $request->get('id');
         $mantenimiento->desc = $request->get('desc');
         $mantenimiento->started_at = $request->get('fecha');
        $mantenimiento->save();
        
         return redirect('mantenimientos');
        
    }
    
    public function editMantenimiento($id)
    {
      
       $mantenimiento = Mantenimiento::find($id); 
       $id_herramienta = $mantenimiento->id_herramienta;
       $herramienta = Herramienta::find($id_herramienta); 
       
      // return view('debug',['datos'=>$herramienta]);
       
       $date = \Carbon\Carbon::parse($mantenimiento->started_at);

    $day = $date->day;
    $month = $date->month;
    $year = $date->year;
       
       
        return view('editarMantenimiento', ['mantenimiento'=>$mantenimiento,'Herramienta'=>$herramienta,'day'=>$day,'month'=>$month,'year'=>$year]);  
    }
    
    
    public function modificar(Request $request)
    {
        $cur_id = $request->get('id');
        $mantenimiento = Mantenimiento::find($cur_id);
        
        $mantenimiento->desc = $request->get('desc');
        $mantenimiento->started_at = $request->get('fecha');
        $mantenimiento->save();
        
        return redirect('mantenimientos');
        
    }
    
    
}
