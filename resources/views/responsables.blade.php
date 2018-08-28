@extends('layouts.app')

@section('title')
Responsables
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

                    <div class="text-right"><a href="{{ route('agregarResponsable') }}" class="btn btn-primary" role="button">Agregar</a></div>
                            
                  
                    <table class="table table-striped task-table">

                    <!-- Table Headings -->
                    <thead>
                        <th>Responsables</th>
                        <th>&nbsp;</th>
     
                    </thead>

                    <!-- Table Body -->
                    <tbody>
                        @foreach ($responsables as $responsable)
                            <tr>
                                <!-- Task Name -->
                                <td class="table-text">
                                    
                                   
                                    <div><a href="{{ route('editResponsable', $responsable->id ) }}">{{ $responsable->nombre }} {{ $responsable->apellidos }} </a></div>
                                </td>

                                
                                
                                <td>
                                    
                                    <!-- TODO: Delete Button -->
                                 <div><a href="{{ route('deleteResponsable', $responsable->id ) }}" class="btn btn-danger" role="button">Eliminar
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
