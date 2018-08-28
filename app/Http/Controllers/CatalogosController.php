<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Catalogo;

class CatalogosController extends Controller
{
    //
    
     public function index()
    {
        //return view('catalogos');
        
            $catalogos = Catalogo::orderBy('id', 'asc')->get();

    return view('catalogos', [
        'catalogos' => $catalogos
    ]);
        
        
    }
    
    
    public function deleteCatalogo($id)
    {
        
        return redirect('/');
    }
    
     public function editCatalogo($id)
    {
        $catalogo = Catalogo::find($id);
        return view('editCatalogo', [
        'Catalogo' => $catalogo
    ]);
    }
    
    public function modificar(Request $request) 
    {
          $catalogo = Catalogo::find($request->get('id'));
          $catalogo->desc = $request->get('desc');
          $catalogo->save();
          return redirect('catalogos');
    }
    
      public function agregarCatalogo()
    {
        
        return view('agregarCatalogo');
    }
    
     public function agregar(Request $request) 
    {
          $catalogo = new Catalogo;
          $catalogo->desc = $request->get('desc');
          $catalogo->save();
          return redirect('catalogos');
    }
    
}
