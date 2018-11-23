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
Route::get('catalogos',['middleware' => 'auth','uses' =>'CatalogosController@index'])->name('catalogos');
Route::get('obras',['middleware' => 'auth','uses' =>'ObrasController@index'])->name('obras');
Route::get('responsables',['middleware' => 'auth','uses' =>'ResponsablesController@index'])->name('responsables');

Route::get('herramientas',['middleware' => 'auth','uses' => 'HerramientasController@index'])->name('herramientas');
Route::post('herramientas',['middleware' => 'auth','uses' => 'HerramientasController@index'])->name('herramientas');

Route::get('ubicaciones',['middleware' => 'auth','uses' =>'UbicacionesController@index'])->name('ubicaciones');
Route::post('ubicaciones',['middleware' => 'auth','uses' =>'UbicacionesController@index'])->name('ubicaciones');

Route::get('mantenimientos',['middleware' => 'auth','uses' =>'MantenimientosController@index'])->name('mantenimientos');
Route::post('mantenimientos',['middleware' => 'auth','uses' =>'MantenimientosController@index'])->name('mantenimientos');

Route::get('usuarios',['middleware' => 'auth','uses' =>'UsuariosController@index'])->name('usuarios');

Route::get('reportes',['middleware' => 'auth', 'uses' => 'ReportesController@index'])->name('reportes');

Route::get('reporteGeneral',['middleware' => 'auth', 'uses' => 'ReportesController@reporteGeneral'])->name('reporteGeneral');
Route::post('reporteGeneral',['middleware' => 'auth', 'uses' => 'ReportesController@reporteGeneral'])->name('reporteGeneral');

Route::get('reporteObra',['middleware' => 'auth', 'uses' => 'ReportesController@reporteObra'])->name('reporteObra');
Route::post('reporteObra',['middleware' => 'auth', 'uses' => 'ReportesController@reporteObra'])->name('reporteObra');

Route::get('reporteSinObra',['middleware' => 'auth', 'uses' => 'ReportesController@reporteSinObra'])->name('reporteSinObra');
Route::post('reporteSinObra',['middleware' => 'auth', 'uses' => 'ReportesController@reporteSinObra'])->name('reporteSinObra');


Route::get('reporteResponsable',['middleware' => 'auth', 'uses' => 'ReportesController@reporteResponsable'])->name('reporteResponsable');
Route::post('reporteResponsable',['middleware' => 'auth', 'uses' => 'ReportesController@reporteResponsable'])->name('reporteResponsable');

Route::get('reporteSinResponsable',['middleware' => 'auth', 'uses' => 'ReportesController@reporteSinResponsable'])->name('reporteSinResponsable');
Route::post('reporteSinResponsable',['middleware' => 'auth', 'uses' => 'ReportesController@reporteSinResponsable'])->name('reporteSinResponsable');


Route::post('generarPDF',['middleware' => 'auth', 'uses' => 'ReportesController@generarPDF'])->name('generarPDF');


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

 
 //Ubicaciones
 Route::get('cambiarHerramienta/{id}',['uses' =>'UbicacionesController@cambiarHerramienta'])->name('cambiarHerramienta');
 Route::get('verHistorial/{id}',['uses' =>'UbicacionesController@verHistorial'])->name('verHistorial');
 Route::get('verEquipos/{id}',['uses' =>'UbicacionesController@verEquipos'])->name('verEquipos');

 
 //Manteminientos
 Route::get('verMantenimientos/{id}',['uses' =>'MantenimientosController@verMantenimientos'])->name('verMantenimientos');
 Route::get('AgregarMantenimiento/{id}',['uses' =>'MantenimientosController@agregarMantenimiento'])->name('agregarMantenimiento');
 Route::get('editMantenimiento/{id}',['uses' =>'MantenimientosController@editMantenimiento'])->name('editMantenimiento');
 
 
 
 //Usuarios
 Route::get('agregarUsuario',['uses' =>'UsuariosController@agregarUsuario'])->name('agregarUsuario');
  Route::get('deleteUsuario/{id}',['uses' =>'UsuariosController@deleteUsuario'])->name('deleteUsuario'); 
 Route::get('editUsuario/{id}',['uses' =>'UsuariosController@editUsuario'])->name('editUsuario');

 
 
 
 
 // Funciones
 
   Route::post('modificar',array('as'=>'modificar','uses'=>'CatalogosController@modificar'));
    Route::post('agregar',array('as'=>'agregar','uses'=>'CatalogosController@agregar')) ;
 
 Route::post('modificar_obra',array('as'=>'modificar','uses'=>'ObrasController@modificar'));
    Route::post('agregar_obra',array('as'=>'modificar','uses'=>'ObrasController@agregar')) ;
    
    Route::post('modificar_responsable',array('as'=>'modificar','uses'=>'ResponsablesController@modificar'));
    Route::post('agregar_responsable',array('as'=>'modificar','uses'=>'ResponsablesController@agregar')) ;
    
    Route::post('modificar_herramienta',array('as'=>'modificar','uses'=>'HerramientasController@modificar'));
    Route::post('agregar_herramienta',array('as'=>'agregar','uses'=>'HerramientasController@agregar'));
    Route::post('agregar_imagen',array('as'=>'agregarImagen','uses'=>'HerramientasController@agregarImagen'));
    
    
    Route::post('agregar_mantenimiento', array('as'=>'agregarMan', 'uses'=>'MantenimientosController@agregarMan'));
     Route::post('modificar_mantenimiento',array('as'=>'modificar_mantenimiento','uses'=>'MantenimientosController@modificar')) ;
     Route::post('cambiar_ubicacion',array('as'=>'cambiarUbicacion','uses'=>'UbicacionesController@cambiar'));
    
     Route::post('agregar_usuario',array('as'=>'agregar','uses'=>'UsuariosController@agregar'));
      Route::post('modificar_usuario',array('as'=>'agregar','uses'=>'UsuariosController@modificar')) ;
  
     
     
/*
 Route::get('editCatalogo/{id}', function ($id) {
    return 'User '.$id;
});
*/