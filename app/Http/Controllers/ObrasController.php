<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Obra;
use App\Estado_Mexico;
use App\Estado_Obra;

class ObrasController extends Controller
{
    //
     public function __construct()
{
    $this->middleware('auth');
}
       public function index()
    {
        //return view('catalogos');
        
            $obras = Obra::orderBy('id', 'asc')->get();

    return view('obras', [
        'obras' => $obras
    ]);
        
        
    }
    
     public function deleteObra($id)
    {
        
        return redirect('/');
    }
    
     public function editObra($id)
    {
        $obra = Obra::find($id);
         $estadosMexico = Estado_Mexico::all(['id', 'nombre'])->pluck('nombre', 'id');
          $estadosObra = Estado_Obra::all(['id', 'desc'])->pluck('desc', 'id');
        
        return view('editarObra', ['Obra'=>$obra,'estadosMexico' => $estadosMexico, 'estadosObra' => $estadosObra]);
        
       
    }
    
    public function modificar(Request $request) 
    {
          $obra = Obra::find($request->get('id'));
           $obra->nombre = $request->get('nombre');
          $obra->desc = $request->get('desc');
          $obra->calle = $request->get('calle');
          
          $obra->numero_ext = $request->get('numero_ext');
          $obra->numero_int = $request->get('numero_int');
          $obra->colonia = $request->get('colonia');
          $obra->municipio = $request->get('municipio');
          $obra->tel1 = $request->get('tel1');
          $obra->tel2 = $request->get('tel2');
          $obra->tel3 = $request->get('tel3');
          $obra->contacto = $request->get('contacto');
          $obra->id_estado = $request->get('id_estado');
          $obra->id_estado_mex = $request->get('id_estado_mex');
          $obra->save();
          return redirect('obras');
    }
    
      public function agregarObra()
    {
          $estadosMexico = Estado_Mexico::all(['id', 'nombre'])->pluck('nombre', 'id');
          $estadosObra = Estado_Obra::all(['id', 'desc'])->pluck('desc', 'id');
        
        return view('agregarObra', ['estadosMexico' => $estadosMexico, 'estadosObra' => $estadosObra]);
    }
    
     public function agregar(Request $request) 
    {
         //'nombre', 'desc','calle' ,'numero_ext', 'numero_int','colonia','municipio','tel1','tel2','tel3','contacto','id_estado','id_estado_mex',
   
         $obra = new Obra;
         $obra->nombre = $request->get('nombre');
          $obra->desc = $request->get('desc');
          $obra->calle = $request->get('calle');
          
          $obra->numero_ext = $request->get('numero_ext');
          $obra->numero_int = $request->get('numero_int');
          $obra->colonia = $request->get('colonia');
          $obra->municipio = $request->get('municipio');
          $obra->tel1 = $request->get('tel1');
          $obra->tel2 = $request->get('tel2');
          $obra->tel3 = $request->get('tel3');
          $obra->contacto = $request->get('contacto');
          $obra->id_estado = $request->get('id_estado');
          $obra->id_estado_mex = $request->get('id_estado_mex');
          
          
          
          $obra->save();
          return redirect('obras');
    }
    
    
    
    
}
