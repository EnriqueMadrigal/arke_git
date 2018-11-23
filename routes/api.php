<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/



Route::post('loginUser',array('as'=>'loginUser','uses'=>'AppUserController@loginUser'));
Route::post('catalogos',array('as'=>'catalogos','uses'=>'AppCatalogoController@catalogos'));
Route::post('obras',array('as'=>'obras','uses'=>'AppHerramientasController@obras'));
Route::post('responsables',array('as'=>'responsables','uses'=>'AppHerramientasController@responsables'));
Route::post('actualizarUbicacion',array('as'=>'actualizarUbicacion','uses'=>'AppHerramientasController@actualizarUbicacion'));
Route::post('agregarImagen',array('as'=>'agregarImagen','uses'=>'AppHerramientasController@agregarImagen'));


Route::post('getHerramientaTipo/{id}', array('as'=>'getHerramientaTipo','uses' =>'AppHerramientasController@getHerramientaTipo')); 
Route::post('getHerramientaObra/{id}', array('as'=>'getHerramientaObra','uses' =>'AppHerramientasController@getHerramientaObra')); 
Route::post('getHerramientaResponsable/{id}', array('as'=>'getHerramientaResponsable','uses' =>'AppHerramientasController@getHerramientaResponsable')); 
Route::post('getHerramientaBusqueda/{id}', array('as'=>'getHerramientaBusqueda','uses' =>'AppHerramientasController@getHerramientaBusqueda')); 


Route::post('getHerramienta/{id}', array('as'=>'getHerramienta','uses' =>'AppHerramientasController@getHerramienta')); 
Route::get('getImageHerramienta/{id}', array('as'=>'getImageHerramienta','uses' =>'AppHerramientasController@getImage')); 
Route::get('getImageHerramientaSmall/{id}', array('as'=>'getImageHerramientaSmall','uses' =>'AppHerramientasController@getImageSmall')); 
Route::get('getImageHerramientaId/{id}', array('as'=>'getImageHerramientaId','uses' =>'AppHerramientasController@getImageId')); 
Route::post('getEquipos/{id}', array('as'=>'getEquipos','uses' =>'AppHerramientasController@getEquipos')); 


//
//Route::post('/loginUser',['middleware' => ['api', 'auth:api'],'uses' =>'AppUserController@loginUser'])->name('loginUser');

Route::get('/test', function () {
    return response('Test API', 200)
                  ->header('Content-Type', 'application/json');
});
