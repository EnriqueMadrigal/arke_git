@extends('layouts.app')

@section('title')
Herramientas
@endsection



@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-2">
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
                      {!! Form::open(array('action' => 'HerramientasController@index', 'method' => 'post', 'name' => 'orderClave')) !!}
                    {!! Form::text('busqueda', '' , ['class' => 'form-control']); !!}
                    {!! Form::submit(trans('Buscar'), ['class' => 'btn btn-default' ]) !!}
                    {!! Form::close() !!}
                      </div>
<br>
                    <div class="text-right"><a href="{{ route('agregarHerramienta') }}" class="btn btn-primary" role="button">Agregar</a></div>
                    
                  @include('modal')
                    <table class="table table-striped task-table" data-toggle="dataTable" data-form="deleteForm">

                    <!-- Table Headings -->
                    <thead>
                        <th>
                       {!! Form::open(array('action' => 'HerramientasController@index', 'method' => 'post', 'class' =>'form-inline', 'name' => 'orderClave')) !!}
                       {!! Form::hidden('orderByClave', 'clave'); !!}
                       {!! Form::submit(trans('Clave'), ['class' => 'btn btn-xs btn-link' ]) !!}
                       {!! Form::close() !!}
                        </th>
                        <th>
                       {!! Form::open(array('action' => 'HerramientasController@index', 'method' => 'post', 'class' =>'form-inline', 'name' =>'orderDesc')) !!}
                       {!! Form::hidden('orderByDesc', 'desc'); !!}
                       {!! Form::submit(trans('Descripción'), ['class' => 'btn btn-xs btn-link' ]) !!}
                       {!! Form::close() !!}
                        </th>
                        <th>&nbsp;</th>
     
                    </thead>

                    <!-- Table Body -->
                    <tbody>
                        @foreach ($herramientas as $herramienta)
                            <tr>
                                <!-- Task Name -->
                                <td class="table-text">
                                    <div><a href="{{ route('editHerramienta', $herramienta->id ) }}">{{ $herramienta->clave }} </a></div>
                                </td>

                                
                                <td class="table-text">
                                    <div>{{ $herramienta->desc }} </div>
                                </td>

                                
                                
                                <td>
                                    
                                    <!-- TODO: Delete Button -->
                                   @if(Auth::user()->type==1)  
                                     {!! Form::model($herramienta, ['method' => 'get', 'route' => ['deleteHerramienta', $herramienta->id], 'class' =>'form-inline form-delete']) !!}
                                     {!! Form::submit(trans('Eliminar'), ['class' => 'btn btn-xs btn-danger delete', 'name' => 'delete_modal']) !!}
                                    {!! Form::close() !!}
                                    
                                   @else
                                   &nbsp;&nbsp;
                                   @endif 
                                 
                                
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


