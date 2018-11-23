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
                    {!! Form::open(array('action' => 'ReportesController@reporteGeneral', 'method' => 'post', 'name' => 'orderClave')) !!}
                    {!! Form::text('busqueda', '' , ['class' => 'form-control']); !!}
                    {!! Form::submit(trans('Buscar'), ['class' => 'btn btn-default' ]) !!}
                    {!! Form::close() !!}
  </div>
<br>

<div class="text-right form-inline">
                    {!! Form::open(array('action' => 'ReportesController@generarPDF', 'method' => 'post', 'name' => 'generarPDF')) !!}
                    {!! Form::submit(trans('Ver PDF'), ['class' => 'btn btn-default' ]) !!}
                    {!! Form::close() !!}
  </div>
   

                        @php
                        $contador=0;
                        @endphp


                    <table class="table table-striped task-table">

                    <!-- Table Headings -->
                    <thead>
                        <tr>
                       <th>
                       {!! Form::open(array('action' => 'ReportesController@reporteGeneral', 'method' => 'post', 'class' =>'form-inline', 'name' => 'orderClave')) !!}
                       {!! Form::hidden('orderByClave', 'clave'); !!}
                       {!! Form::submit(trans('Clave'), ['class' => 'btn btn-xs btn-link' ]) !!}
                       {!! Form::close() !!}
                        </th>
                        <th>
                       {!! Form::open(array('action' => 'ReportesController@reporteGeneral', 'method' => 'post', 'class' =>'form-inline', 'name' =>'orderDesc')) !!}
                       {!! Form::hidden('orderByDesc', 'desc'); !!}
                       {!! Form::submit(trans('Descripción'), ['class' => 'btn btn-xs btn-link' ]) !!}
                       {!! Form::close() !!}
                        </th>
                        </tr>
     
                    </thead>

                    <!-- Table Body -->
                    <tbody>
                        @foreach ($herramientas as $herramienta)
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
                                    
                      
                        @for ($i = 1; $i <= $herramienta->cantidad; $i++)
                        @php
                        $contador++;
                        @endphp

                                @if(strcmp($herramienta->getObra($i)->nombre,"Sin Asignar")==0 || strcmp($herramienta->getResponsable($i)->desc,"Sin Asignar")==0)
                                
                                <tr class="bg-danger">
                                @else
                                <tr>
                                    
                                @endif    
                                    
                                <td class="col-md-2">{{$i }}</td> 
                                <td class="col-md-3"><div>{{ $herramienta->getObra($i)->nombre }}</div></td>
                                <td class="col-md-3"><div>{{ "{$herramienta->getResponsable($i)->nombre} {$herramienta->getResponsable($i)->apellidos}" }}</div></td>
                                
                                                                   
                                 </tr>     
                                @endfor          
                                      
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
</div>
@endsection
