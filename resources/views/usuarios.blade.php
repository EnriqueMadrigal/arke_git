@extends('layouts.app')

@section('title')
Usuarios
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

                    <div class="text-right"><a href="{{ route('agregarUsuario') }}" class="btn btn-primary" role="button">Agregar</a></div>
                            
                  
                    <table class="table table-striped task-table">

                    <!-- Table Headings -->
                    <thead>
                        <th>Usuarios</th>
                        <th>&nbsp;</th>
     
                    </thead>

                    <!-- Table Body -->
                    <tbody>
                        @foreach ($usuarios as $usuario)
                            <tr>
                                <!-- Task Name -->
                                <td class="table-text">
                                    
                                   
                                    <div><a href="{{ route('editUsuario', $usuario->id ) }}">{{ $usuario->nombre }} {{ $usuario->apellidos }} </a></div>
                                </td>

                                
                                
                                <td>
                                    
                                    <!-- TODO: Delete Button -->
                                 <div><a href="{{ route('deleteUsuario', $usuario->id ) }}" class="btn btn-danger" role="button">Eliminar
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
