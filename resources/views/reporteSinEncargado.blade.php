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
 
 

<br>

<div class="text-right form-inline">
                    {!! Form::open(array('action' => 'ReportesController@reporteSinResponsable', 'method' => 'post', 'name' => 'generarPDF')) !!}
                    {!! Form::hidden('order', $order) !!}
                    {!! Form::hidden('requestPdf', 'Pdf'); !!}
                    {!! Form::submit(trans('Ver PDF'), ['class' => 'btn btn-default' ]) !!}
                    {!! Form::close() !!}
  </div>
   



                    <table class="table table-striped task-table">

                    <!-- Table Headings -->
                    <thead>
                        <tr>
                       <th>
                       {!! Form::open(array('action' => 'ReportesController@reporteSinResponsable', 'method' => 'post', 'class' =>'form-inline', 'name' => 'orderClave')) !!}
                       {!! Form::hidden('orderByClave', 'clave'); !!}
                       {!! Form::submit(trans('Clave'), ['class' => 'btn btn-xs btn-link' ]) !!}
                       {!! Form::close() !!}
                        </th>
                        <th>
                       {!! Form::open(array('action' => 'ReportesController@reporteSinResponsable', 'method' => 'post', 'class' =>'form-inline', 'name' =>'orderDesc')) !!}
                       {!! Form::hidden('orderByDesc', 'desc'); !!}
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
                         $curUbicaciones = $herramienta->hasNotResponsables();
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

                                    <tr>
                                    
                                     
                                <td class="col-md-2">{{$ubicacion->no_equipo }}</td>
                                @if($ubicacion->obra)
                                <td class="col-md-3"><div>{{ $ubicacion->obra->nombre }}</div></td>
                                @else
                                 <td class="col-md-3"><div>Sin Asignar</div></td>
                                @endif
                                
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
