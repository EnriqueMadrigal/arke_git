<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsuariosCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
         'nombre' => 'required',
          'apellidos' => 'required',
        'password' => 'required|min:8',
          'username' => 'required|min:8',
                 
        ];
    }
    
      public function messages()
{
    return [
        'nombre.required' => 'El :attribute es obligatorio.',
        'apellidos.required' => 'Los :attribute son obligatorios.',
       'password.required' => 'La :attribute es obligatoria.',
        'password.min' => 'La :attribute debe ser mínimo de 8',
        'username.required' => 'El :attribute es obligatorio',
        'username.min' => 'El :attribute debe ser mínimo de 8',
        
    ];
}
    

public function attributes()
{
    return [
        'nombre' => 'Nombre de la persona',
        'apellidos' => 'Apellidos de la persona',
        'password' => 'Contraseña',
        'username' => 'Username'
    ];
}

public function response(array $errors)
    {
        if ($this->expectsJson()) {
            return new JsonResponse($errors, 422);
        }
 
        return $this->redirector->to($this->getRedirectUrl())
            ->withInput($this->except($this->dontFlash))
            ->withErrors($errors, $this->errorBag);
    }

    
    
}
