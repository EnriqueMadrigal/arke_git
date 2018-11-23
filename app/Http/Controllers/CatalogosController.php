<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Catalogo;
use App\Catalogo_fotos;

class CatalogosController extends Controller
{
    //
     public function __construct()
{
    $this->middleware('auth');
}

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
        
          $cur_foto = Catalogo_fotos::where('id_catalogo', $id)->first();
        
        
        if($cur_foto === null){
    $file_save_folder = "";
    $curPath = "";
        }
        
        else {
            $file_save_folder = "uploaded_folder\\fotos_catalogo\\$id\\$cur_foto->archivo";
            
                 // $curPath = public_path($file_save_folder);
            $curPath = asset($file_save_folder);
        }
        
        
        return view('editCatalogo', ['Catalogo'=>$catalogo, 'curpath'=>$curPath]);
        
        
    }
    
    public function modificar(Request $request) 
    {
        $cur_id = $request->get('id');  
        
        $catalogo = Catalogo::find($cur_id);
          $catalogo->desc = $request->get('desc');
          $catalogo->save();
          
          
          //////////////
          
           $curfile = $request->file('image');
   

  
  if ($curfile) 
  {
      $imageName = $curfile->getClientOriginalName();
      $filesize = $curfile->getSize();
      $filetype = $curfile->getMimeType();
 

    $file_save_folder = "uploaded_folder".DIRECTORY_SEPARATOR."fotos_catalogo".DIRECTORY_SEPARATOR.$cur_id.DIRECTORY_SEPARATOR;
      
                  $curPath = public_path($file_save_folder);
                                                                       
                        if (!file_exists($curPath))
                        {
                            
                        if (mkdir($curPath)){
                           
                        }
                        else {
                            Session::flash('error', 'No se agrego la fotografia'); 
                            return redirect('catalogos');
                        }
                        }
        

      // Checa si ya tenia una foto
       $responsable_foto = Catalogo_Fotos::where('id_catalogo', $cur_id)->first();
        
        
        if($responsable_foto === null){ // Si no tiene agregar nuevo registro
         $responsable_foto = new Catalogo_Fotos;
            
            
        }
            
        
        
        else { // Si ya tiene elimina la imagen actual
            $cur_file = $responsable_foto->archivo;
            ////
          
            $file_folder = "uploaded_folder".DIRECTORY_SEPARATOR."fotos_catalogo".DIRECTORY_SEPARATOR.$cur_id.DIRECTORY_SEPARATOR.$cur_file;
      
                  $curPath = public_path($file_folder);
                                                                        
                        if (!file_exists($curPath))
                        {
                            unlink($curPath);
                        }
            //////
            
            
            
        }
      
       $curfile->move($curPath, $imageName);
      $responsable_foto->id_catalogo=$cur_id;
      $responsable_foto->archivo = $imageName;
      $responsable_foto->type = $filetype;
      $responsable_foto->size = $filesize;
      $responsable_foto->save();
  }
          
          //////////
          
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
          
          
          $new_id = $catalogo->id;
          ////////
          $curfile = $request->file('image');
   

  
  if ($curfile) 
  {
      $imageName = $curfile->getClientOriginalName();
      $filesize = $curfile->getSize();
      $filetype = $curfile->getMimeType();
 

    $file_save_folder = "uploaded_folder".DIRECTORY_SEPARATOR."fotos_catalogo".DIRECTORY_SEPARATOR."$new_id".DIRECTORY_SEPARATOR;
      
                  $curPath = public_path($file_save_folder);
                                                                        
                        if (!file_exists($curPath))
                        {
                            
                        if (mkdir($curPath)){
                           
                        }
                        else {
                            Session::flash('error', 'No se agrego la fotografia'); 
                            return redirect('catalogos');
                        }
                        }
    
      $curfile->move($curPath, $imageName);

      $responsable_foto = new Catalogo_Fotos;
      $responsable_foto->id_catalogo=$new_id;
      $responsable_foto->archivo = $imageName;
      $responsable_foto->type = $filetype;
      $responsable_foto->size = $filesize;
      $responsable_foto->save();
      
      
      
                  
              
            
            
  }
  
          
          ///////
          
          
          return redirect('catalogos');
    }
    
}
