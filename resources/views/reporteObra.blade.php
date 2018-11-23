@extends('layouts.app')

@section('title')
Reportes
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
               

                <div class="panel-body">
                   @if(Session::has('msg'))
        <div class="alert alert-info">
            <a class="close" data-dismiss="alert">×</a>
            <strong>Heads Up!</strong> {!!Session::get('msg')!!}
        </div>
    @endif
    
    @if(session()->has('message.level'))
    <div class="alert alert-{{ session('message.level') }}"> 
    {!! session('message.content') !!}
    </div>
@endif
 
 <div class="text-right form-inline">
 {!! Form::open(array('action' => 'ReportesController@reporteObra', 'method' => 'post', 'name' => 'BuscarResponsable')) !!}
 {!! Form::label('label22', 'Obra:', ['class' => 'col-md-4 control-label']); !!}
 {!! Form::select('id_obra', $obras, $id_obra, ['class' => 'form-control']); !!}
 {!! Form::submit(trans('Seleccionar'), ['class' => 'btn btn-default' ]) !!}
 {!! Form::close() !!}
  </div>


<br>

<div class="text-right form-inline">
                    {!! Form::open(array('action' => 'ReportesController@reporteObra', 'method' => 'post', 'name' => 'generarPDF')) !!}
                    {!! Form::submit(trans('Ver PDF'), ['class' => 'btn btn-default' ]) !!}
                    {!! Form::hidden('id_obra', $id_obra) !!}
                    {!! Form::hidden('order', $order) !!}
                    {!! Form::hidden('requestPdf', 'Pdf'); !!}
                    {!! Form::close() !!}
  </div>
   



                    <table class="table table-striped task-table">

                    <!-- Table Headings -->
                    <thead>
                        <tr>
                       <th>
                       {!! Form::open(array('action' => 'ReportesController@reporteObra', 'method' => 'post', 'class' =>'form-inline', 'name' => 'orderClave')) !!}
                       {!! Form::hidden('orderByClave', 'clave'); !!}
                       {!! Form::hidden('id_obra', $id_obra) !!}
                       {!! Form::submit(trans('Clave'), ['class' => 'btn btn-xs btn-link' ]) !!}
                       {!! Form::close() !!}
                        </th>
                        <th>
                       {!! Form::open(array('action' => 'ReportesController@reporteObra', 'method' => 'post', 'class' =>'form-inline', 'name' =>'orderDesc')) !!}
                       {!! Form::hidden('orderByDesc', 'desc'); !!}
                       {!! Form::hidden('id_obra', $id_obra) !!}
                       {!! Form::submit(trans('Descripción'), ['class' => 'btn btn-xs btn-link' ]) !!}
                       {!! Form::close() !!}
                        </th>
                        </tr>
     
                    </thead>

                    <!-- Table Body -->
                    <tbody>
                        @php
                        $contador=0;
                        @endphp

                         @foreach ($herramientas as $herramienta)
                         
                          @php
                         $curUbicaciones = $herramienta->hasUbicaciones($id_obra);
                         if (count($curUbicaciones) == 0){
                         continue;
                         }
                         @endphp
                         
                         
                        
                           <tr>
                                <!-- Task Name -->
                                
                                <td class="table-text">
                                    
                                    <div>{{  $herramienta->clave }} </div>

                                </td>

                                
                                <td class="table-text">
                                    
                                   
                                    <div>{{ $herramienta->desc }}</div>
                                    <br>
                                      <table class="table" bgcolor="#00FF00">

                                     <!-- Table Headings -->
                                    <thead>
                                        <tr>
                                    <th>Num. Equipo</th>
                                    <th>Ubicación</th>
                                    <th>Responsable</th>
                                        </tr>
                                      </thead>
                                    
                                @foreach ($curUbicaciones as $ubicacion)
                                
                       @php
                        $contador++;
                        @endphp

                                 @if(strcmp($ubicacion->obra->nombre,"Sin Asignar")==0 || strcmp($ubicacion->obra->desc,"Sin Asignar")==0)
                                
                                <tr class="bg-danger">
                                @else
                                <tr>
                                    
                                @endif    
                                    
                                <td class="col-md-2">{{$ubicacion->no_equipo }}</td>
                                <td class="col-md-3"><div>{{ $ubicacion->obra->nombre }}</div></td>
                                @if($ubicacion->responsable)
                                <td class="col-md-3"><div>{{ "{$ubicacion->responsable->nombre} {$ubicacion->responsable->apellidos}"}}</div></td>
                               @else
                                <td class="col-md-3"><div>Sin Asignar</div></td>
                                @endif
                                
                                 
                                      
                                 </tr>     
                                 @endforeach          
                                      
                                </table>
                                
                                
                                </td>

                              
                             
                            </tr>
                        @endforeach
                    </tbody>
                </table>

<div class='text-capitalize'>
Total de herramientas = {{$contador}}
    
            </div>
                    
                    
                    
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
