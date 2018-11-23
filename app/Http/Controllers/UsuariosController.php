<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Usuario;
use App\User;
use App\Estados_Usuario;
use App\Permisos_Usuario;
use App\Http\Requests\UsuariosCreateRequest;
use Illuminate\Support\Facades\Hash;

class UsuariosController extends Controller
{
    //
    
     public function __construct()
    {   
    $this->middleware('auth');
    }
    
    
       public function index()
    {
        //return view('catalogos');
        
            $usuarios = Usuario::orderBy('id', 'asc')->get();

    return view('usuarios', [
        'usuarios' => $usuarios
    ]);
    }   
    
       public function agregarUsuario()
    {
          $estadosUsuario = Estados_Usuario::all(['id', 'desc'])->pluck('desc', 'id');
          $permisosUsuario = Permisos_Usuario::all(['id', 'desc'])->pluck('desc', 'id');
         
        return view('agregarUsuario', ['estadosusuario' => $estadosUsuario, 'permisosusuario' => $permisosUsuario]);
    }
      
    
      public function agregar(UsuariosCreateRequest $request)
    {
   
          
           $usuario = new Usuario;
           
           $nombre = $request->get('nombre');
           $apellidos = $request->get('apellidos');
           $username = $request->get('username');
           $permiso = $request->get('id_permiso');
           $estado = $request->get('id_estado');
           $pass = $request->get('password');
           $password = Hash::make($pass);
           
           
            $usuario->nombre = $nombre;
            $usuario->apellidos = $apellidos;
            $usuario->tel = $request->get('tel');
            $usuario->id_estado = $estado;
            $usuario->id_permiso = $permiso;
            $usuario->username = $username;
            $usuario->desc = $request->get('desc');
            $usuario->password = $password;
            
            $usuario->save();
            
            
            //Agregar a Users
            
            $user = new User;
            $user->name = $nombre." ".$apellidos;
            $user->email = $username."@arke.mx";
            $user->username = $username;
            $user->password = $password;
            $user->type = $permiso;
            $user->active = $estado;
            $user->id_usuario = $usuario->id;
            $user->save();
            
            
             return redirect('usuarios');
             
             
       
    } 
    
    
        public function editUsuario($id)
    {
              $usuario = Usuario::find($id);
       
            
            $estadosUsuario = Estados_Usuario::all(['id', 'desc'])->pluck('desc', 'id');
          $permisosUsuario = Permisos_Usuario::all(['id', 'desc'])->pluck('desc', 'id');
         
        return view('editarUsuario', ['Usuario' => $usuario, 'estadosusuario' => $estadosUsuario, 'permisosusuario' => $permisosUsuario]);

            
            
            
    }
    
    
      public function modificar(Request $request) 
    {
   
          $id = $request->get('id');
            $usuario = Usuario::find($id);
            
           $nombre = $request->get('nombre');
           $apellidos = $request->get('apellidos');
           $username = $request->get('username');
           $permiso = $request->get('id_permiso');
           $estado = $request->get('id_estado');
           $pass = $request->get('password');
            
          
            $usuario->nombre = $nombre;
            $usuario->apellidos = $apellidos;
            $usuario->tel = $request->get('tel');
            $usuario->id_estado = $estado;
            $usuario->id_permiso = $permiso;
            $usuario->username = $username;
            $usuario->desc = $request->get('desc');
            
            
            if (strlen($pass)>= 8)
            {
            $password = Hash::make($pass);
            $usuario->password = $password;
            }
            
            
            $usuario->save();
            
            
            $user = User::where('id_usuario', $id)->first();
            $user->name = $nombre." ".$apellidos;
            $user->username = $username;
            
             if (strlen($pass)>= 8)
            {
            $password = Hash::make($pass);
            $user->password = $password;
            }
           
            
            $user->type = $permiso;
            $user->active = $estado;
            $user->id_usuario = $usuario->id;
            $user->save();
            
            
            return redirect('usuarios');
          
    }
     
    
    
    
        public function deleteUsuario($id)
    {
  
             return redirect('usuarios');
    }
        
    
    
}
