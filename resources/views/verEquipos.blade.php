@extends('layouts.app')

@section('title')
Equipos Asignados
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

                   
<h5>{{ $herramienta->clave }},{{ $herramienta->desc }}</h5>

                    <table class="table table-striped task-table">

                    <!-- Table Headings -->
                    <thead>
                        <th>Número Equipo</th>
                        <th>Ubicación Actual</th>
                        <th>Responsable</th>
                        <th>Ver historial</th>
                        <th>Cambiar</th>
                        
                        
     
                    </thead>

                    <!-- Table Body -->
                    <tbody>
                        @for ($i = 1; $i <= $herramienta->cantidad; $i++)
                            <tr>
                                <!-- Task Name -->
                                
                                
                                <td class="table-text">
                                       <div>{{ $i }}</div>
                                </td>

                                
                                 <td><div>{{ $herramienta->getObra($i)->nombre }}</div></td>
                                 <td><div>{{ "{$herramienta->GetResponsable($i)->nombre} {$herramienta->GetResponsable($i)->apellidos}"}}</div></td>
                             
                                
                                
                                <td>
                                    
                                    <!-- TODO: Delete Button -->
                                 <div><a href="{{ route('verHistorial', "{$herramienta->id}-{$i}" ) }}" class="btn btn-primary" role="button"><i class="fa fa-server">Historial</i>
                                 </a></div>
                                  </td>
                                  
                                 <td>
                                    <!-- TODO: Delete Button -->
                                 <div><a href="{{ route('cambiarHerramienta', "{$herramienta->id}-{$i}" ) }}" class="btn btn-primary" role="button">Ubicar
                                 </a></div>
                                  
                                </td>   
                                
                                
                                
                            </tr>
                        @endfor
                    </tbody>
                </table>
            </div>
                    
                    
                    
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
