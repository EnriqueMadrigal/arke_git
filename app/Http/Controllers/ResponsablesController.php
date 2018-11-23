<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Responsable;
use App\Responsable_Fotos;
use Session;



class ResponsablesController extends Controller
{
    //
     public function __construct()
{
    $this->middleware('auth');
}

        public function index()
    {
        //return view('catalogos');
        
            $responsables = Responsable::orderBy('id', 'asc')->get();

    return view('responsables', [
        'responsables' => $responsables
    ]);
    }   
 
    
     public function deleteResponsable($id)
    {
        
        return redirect('/');
    }
    
     public function editResponsable($id)
    {
        $responsable = Responsable::find($id);
        $cur_foto = Responsable_Fotos::where('id_responsable', $id)->first();
        
        
        if($cur_foto === null){
    $file_save_folder = "";
    $curPath = "";
        }
        
        else {
            $file_save_folder = "uploaded_folder\\fotos_responsables\\$id\\$cur_foto->archivo";
            
                 // $curPath = public_path($file_save_folder);
            $curPath = asset($file_save_folder);
        }
        
       
      
                 
        
        return view('editarResponsable', ['Responsable'=>$responsable, 'curpath'=>$curPath]);
        
       
    }
       public function agregarResponsable()
    {
        
        return view('agregarResponsables');
    }
    
    
      public function agregar(Request $request) 
    {
         //'nombre', 'desc','calle' ,'numero_ext', 'numero_int','colonia','municipio','tel1','tel2','tel3','contacto','id_estado','id_estado_mex',
   
         $responsable = new Responsable;
         $responsable->nombre = $request->get('nombre');
         $responsable->apellidos = $request->get('apellidos');
         $responsable->tel = $request->get('tel');
         $responsable->desc = $request->get('desc');
         
         $responsable->id_photo = 0;
         
           $responsable->save();
         
           $new_id = $responsable->id;
         ///////////
         
         //////// Guardar imagen si existe
  
  $curfile = $request->file('image');
   

  
  if ($curfile) 
  {
      $imageName = $curfile->getClientOriginalName();
      $filesize = $curfile->getSize();
      $filetype = $curfile->getMimeType();
 

    $file_save_folder = "uploaded_folder".DIRECTORY_SEPARATOR."fotos_responsables".DIRECTORY_SEPARATOR."$new_id".DIRECTORY_SEPARATOR;
      
                  $curPath = public_path($file_save_folder);
                                                                        
                        if (!file_exists($curPath))
                        {
                            
                        if (mkdir($curPath)){
                           
                        }
                        else {
                            Session::flash('error', 'No se agrego la fotografia'); 
                            return redirect('responsables');
                        }
                        }
    
      $curfile->move($curPath, $imageName);

      $responsable_foto = new Responsable_Fotos;
      $responsable_foto->id_responsable=$new_id;
      $responsable_foto->archivo = $imageName;
      $responsable_foto->type = $filetype;
      $responsable_foto->size = $filesize;
      $responsable_foto->save();
      
      
      
                  
              
            
            
  }
  
     
         Session::flash('success', 'Datos Agregados correctamente');  
          return redirect('responsables');
    }
    
    
     public function modificar(Request $request) 
    {
         $cur_id = $request->get('id');
         $responsable = Responsable::find($cur_id);
           $responsable->nombre = $request->get('nombre');
         $responsable->apellidos = $request->get('apellidos');
         $responsable->tel = $request->get('tel');
         $responsable->desc = $request->get('desc');
          $responsable->save();
          
         $curfile = $request->file('image');
   

  
  if ($curfile) 
  {
      $imageName = $curfile->getClientOriginalName();
      $filesize = $curfile->getSize();
      $filetype = $curfile->getMimeType();
 

    $file_save_folder = "uploaded_folder".DIRECTORY_SEPARATOR."fotos_responsables".DIRECTORY_SEPARATOR."$cur_id".DIRECTORY_SEPARATOR;
      
                  $curPath = public_path($file_save_folder);
                                                                        
                        if (!file_exists($curPath))
                        {
                            
                        if (mkdir($curPath)){
                           
                        }
                        else {
                            Session::flash('error', 'No se agrego la fotografia'); 
                            return redirect('responsables');
                        }
                        }
    
     

      // Checa si ya tenia una foto
       $responsable_foto = Responsable_Fotos::where('id_responsable', $cur_id)->first();
        
        
        if($responsable_foto === null){ // Si no tiene agregar nuevo registro
         $responsable_foto = new Responsable_Fotos;
            
            
        }
            
        
        
        else { // Si ya tiene elimina la imagen actual
            $cur_file = $responsable_foto->archivo;
            ////
          
            $file_folder = "uploaded_folder".DIRECTORY_SEPARATOR."fotos_responsables".DIRECTORY_SEPARATOR.$cur_id.DIRECTORY_SEPARATOR.$cur_file;
      
                  $curPath = public_path($file_folder);
                                                                        
                        if (!file_exists($curPath))
                        {
                            unlink($curPath);
                        }
            //////
            
            
            
        }
      
       $curfile->move($curPath, $imageName);
      $responsable_foto->id_responsable=$cur_id;
      $responsable_foto->archivo = $imageName;
      $responsable_foto->type = $filetype;
      $responsable_foto->size = $filesize;
      $responsable_foto->save();
      
       
                  
              
            
            
  }
   
          
          
          return redirect('responsables');
    }
    
    
}

