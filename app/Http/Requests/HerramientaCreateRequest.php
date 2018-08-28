<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HerramientaCreateRequest extends FormRequest
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
     * 'clave', 'desc','modelo' ,'marca','capacidad','id_estadoequipo','id_tipo','cantidad','costo','supervisor'
     * @return array
     */
    public function rules()
    {
      return [
        'desc' => 'required',
         'clave' => 'required', 
        'cantidad' => 'required|min:1',
          'modelo' => 'required',
          'marca' => 'required',
          'costo' => 'required|min:1',
          
    ];
    }
    
    
    
    public function messages()
{
    return [
        'desc.required' => 'Una :attribute es obligatoria.',
        'clave.required' => 'Añade una :attribute',
        'cantidad.min' => 'La :attribute debe ser mínimo 1',
        'cantidad.required' => 'La :attribute debe ser mínimo 1',
        'marca.required' => 'Añade una :attribute',
        'modelo.required' => 'Añade un :attribute',
        'costo.min' => 'El :attribute debe ser mínimo 1',
        'costo.required' => 'El :attribute debe ser mínimo 1',
    ];
}
    

public function attributes()
{
    return [
        'desc' => 'Descripción de la herramienta',
        'clave' => 'Clave de la herramienta',
        'cantidad' => 'Cantidad de equipos',
        'marca' => 'Marca de la herramienta',
        'modelo' => 'Modelo de la herramienta',
        'costo' => 'Costo de la herramienta',
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
