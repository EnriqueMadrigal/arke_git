@extends('layouts.app')

@section('title')
Tipos de Herramientas
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
               

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="text-right"><a href="{{ route('agregarCatalogo') }}" class="btn btn-primary" role="button">Agregar</a></div>
                            
                    
                    <table class="table table-striped task-table">

                    <!-- Table Headings -->
                    <thead>
                        <th>Catalogos de herramientas</th>
                        <th>&nbsp;</th>
     
                    </thead>

                    <!-- Table Body -->
                    <tbody>
                        @foreach ($catalogos as $catalogo)
                            <tr>
                                <!-- Task Name -->
                                <td class="table-text">
                                    
                                    
                                    <div><a href="{{ route('editCatalogo', $catalogo->id ) }}">{{ $catalogo->desc }}</a></div>
                                </td>

                                
                                
                                <td>
                                    
                                    <!-- TODO: Delete Button -->
                                 <div><a href="{{ route('deleteCatalogo', $catalogo->id ) }}" class="btn btn-danger" role="button">Eliminar
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
