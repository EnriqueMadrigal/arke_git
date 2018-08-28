<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*
Route::get('/', function () {
    return view('welcome');
});
*/
Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('catalogos','CatalogosController@index')->name('catalogos');
Route::get('obras','ObrasController@index')->name('obras');
Route::get('responsables','ResponsablesController@index')->name('responsables');
Route::get('herramientas','HerramientasController@index')->name('herramientas');

   
//Catalogos
Route::get('deleteCatalogo/{id}',['uses' =>'CatalogosController@deleteCatalogo'])->name('deleteCatalogo'); 
 Route::get('editCatalogo/{id}',['uses' =>'CatalogosController@editCatalogo'])->name('editCatalogo');
 Route::get('agregarCatalogo',['uses' =>'CatalogosController@agregarCatalogo'])->name('agregarCatalogo');
 
 //Obras
 Route::get('deleteObra/{id}',['uses' =>'ObrasController@deleteObra'])->name('deleteObra'); 
 Route::get('editObra/{id}',['uses' =>'ObrasController@editObra'])->name('editObra');
 Route::get('agregarObra',['uses' =>'ObrasController@agregarObra'])->name('agregarObra');

 //Responsables
 Route::get('deleteResponsable/{id}',['uses' =>'ResponsablesController@deleteResponsable'])->name('deleteResponsable'); 
 Route::get('editResponsable/{id}',['uses' =>'ResponsablesController@editResponsable'])->name('editResponsable');
 Route::get('agregarResponsable',['uses' =>'ResponsablesController@agregarResponsable'])->name('agregarResponsable');
 
 //Herramientas
 Route::get('deleteHerramienta/{id}',['uses' =>'HerramientasController@deleteHerramienta'])->name('deleteHerramienta'); 
 Route::get('editHerramienta/{id}',['uses' =>'HerramientasController@editHerramienta'])->name('editHerramienta');
 Route::get('agregarHerramienta',['uses' =>'HerramientasController@agregarHerramienta'])->name('agregarHerramienta');
 
 
 
 // Funciones
 
   Route::post('modificar',array('as'=>'modificar','uses'=>'CatalogosController@modificar'));
    Route::post('agregar',array('as'=>'agregar','uses'=>'CatalogosController@agregar')) ;
 
 Route::post('modificar_obra',array('as'=>'modificar','uses'=>'ObrasController@modificar'));
    Route::post('agregar_obra',array('as'=>'modificar','uses'=>'ObrasController@agregar')) ;
    
    Route::post('modificar_responsable',array('as'=>'modificar','uses'=>'ResponsablesController@modificar'));
    Route::post('agregar_responsable',array('as'=>'modificar','uses'=>'ResponsablesController@agregar')) ;
    
     Route::post('modificar_herramienta',array('as'=>'modificar','uses'=>'HerramientasController@modificar'));
    Route::post('agregar_herramienta',array('as'=>'modificar','uses'=>'HerramientasController@agregar')) ;
/*
 Route::get('editCatalogo/{id}', function ($id) {
    return 'User '.$id;
});
*/