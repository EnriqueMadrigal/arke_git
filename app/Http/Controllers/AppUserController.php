<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Usuario;
use Illuminate\Support\Facades\Hash;
use App\Http\Resources\UserAppResource;

class AppUserController extends Controller
{
    //
    
      public function __construct()
    {
      $this->middleware('auth:api')->except(['loginUser', 'show']);
    }
    
    
    public function loginUser(Request $request)
    {
        
         $validatedData = $request->validate([
        'username' => 'required',
        'password' => 'required',
    ]);
        
           $username = $request->get('username'); 
           $pass = $request->get('password');
        
          $user = Usuario::where('username', $username)->first();
          
       
          
          if ($user != NULL ) 
          {
            // Usuario si existe
        
              ///////////
           
               $curPassword = $user->password;  
          
          if (Hash::check($pass, $curPassword))
        {
      return response()->json([
            'error' => 0,
            //'message' => $user->toArray()
          'message' => new UserAppResource($user)
        ]);
              
        }                 
                   
    else
    {
           return response()->json([
            'error' => 1,
            'message' => "Incorrect Password"  
        ]);
              
        
    }
              
              //////////
          }
          
          
          else
          {
              
                return response()->json([
            'error' => 1,
            'message' => "user not exists"
        ]);
              
              
          }
          
          
   
    
    }
}
