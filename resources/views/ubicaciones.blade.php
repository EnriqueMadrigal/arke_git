@extends('layouts.app')

@section('title')
Ubicación de las herramientas
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

                   
                    <table class="table table-striped task-table">

                    <!-- Table Headings -->
                    <thead>
                        <th>Herramienta</th>
                        <th>Ubicación Actual</th>
                        <th>Responsable</th>
                        <th>Ver historial</th>
                        
                        <th>&nbsp;</th>
     
                    </thead>

                    <!-- Table Body -->
                    <tbody>
                        @foreach ($herramientas as $herramienta)
                            <tr>
                                <!-- Task Name -->
                                
                                
                                
                                <td class="table-text">
                                    
                                   
                                    <div>{{ $herramienta->desc }}</div>
                                </td>

                                 <td><div>{{ $herramienta->obra->nombre }}</div></td>
                                 <td><div>{{ "{$herramienta->responsable->nombre} {$herramienta->responsable->apellidos}"}}</div></td>
                               
                                  <td>
                                    
                                    <!-- TODO: Delete Button -->
                                 <div><a href="{{ route('verHistorial', $herramienta->id ) }}" class="btn btn-primary" role="button"><i class="fa fa-server">H</i>
                                 </a></div>
                                 
                                                             
                               
                               
                                 <td>
                                    
                                    <!-- TODO: Delete Button -->
                                 <div><a href="{{ route('cambiarHerramienta', $herramienta->id ) }}" class="btn btn-primary" role="button">Cambiar Ubicación
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
