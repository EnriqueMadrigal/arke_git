@extends('layouts.app')

@section('title')
Mantenimientos de las herramientas
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
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
                    {!! Form::open(array('action' => 'MantenimientosController@index', 'method' => 'post', 'name' => 'orderClave')) !!}
                    {!! Form::text('busqueda', '' , ['class' => 'form-control']); !!}
                    {!! Form::submit(trans('Buscar'), ['class' => 'btn btn-default' ]) !!}
                    {!! Form::close() !!}
  </div>
        
                   
                    <table class="table table-striped task-table">

                    <!-- Table Headings -->
                    <thead>
                        <th>
                       {!! Form::open(array('action' => 'MantenimientosController@index', 'method' => 'post', 'class' =>'form-inline', 'name' => 'orderClave')) !!}
                       {!! Form::hidden('orderByClave', 'clave'); !!}
                       {!! Form::submit(trans('Clave'), ['class' => 'btn btn-xs btn-link' ]) !!}
                       {!! Form::close() !!}
                        </th>
                        <th>
                       {!! Form::open(array('action' => 'MantenimientosController@index', 'method' => 'post', 'class' =>'form-inline', 'name' =>'orderDesc')) !!}
                       {!! Form::hidden('orderByDesc', 'desc'); !!}
                       {!! Form::submit(trans('Descripción'), ['class' => 'btn btn-xs btn-link' ]) !!}
                       {!! Form::close() !!}
                        </th>
                  
                        <th>Último mantenimiento</th>
                        <th>Fecha</th>
                        <th>Ver mantenimientos</th>
                        
                        <th>&nbsp;</th>
     
                    </thead>

                    <!-- Table Body -->
                    <tbody>
                        @foreach ($herramientas as $herramienta)
                            <tr>
                                <!-- Task Name -->
                                
                                <td class="table-text">
                                   <div>{{ $herramienta->clave }}</div>
                                      
                                </td>
                                
                                
                                <td class="table-text">
                                   <div>{{ $herramienta->desc }}</div>
                                      
                                </td>
                                 @if($herramienta->Mantenimiento)   
                                 <td><div>{{ $herramienta->Mantenimiento->desc }}</div></td>
                                 <td><div>{{ \Carbon\Carbon::parse($herramienta->Mantenimiento->started_at)->format('d/m/Y')}}</div></td>
                                <td>
                                 <!-- TODO: Delete Button -->
                                 <div><a href="{{ route('verMantenimientos', $herramienta->id ) }}" class="btn btn-info" role="button"><i class="fa fa-server">M</i>
                                 </a></div>
                                </td>
                                 
                                 @else
                                 <td><div>---</div></td>
                                 <td><div>---</div></td>
                                 <td>&nbsp;</td>
                              
                               @endif  
                                 
                                
                                
                                 <td>
                                    
                                    <!-- TODO: Delete Button -->
                                 <div><a href="{{ route('agregarMantenimiento', $herramienta->id ) }}" class="btn btn-primary" role="button">Agregar Mto.
                                 </a></div>
                                </td>
                                
                                
                                
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
                    
                    
                    
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
