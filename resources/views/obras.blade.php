@extends('layouts.app')

@section('title')
Obras
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

                    <div class="text-right"><a href="{{ route('agregarObra') }}" class="btn btn-primary" role="button">Agregar</a></div>
                            
                  
                    <table class="table table-striped task-table">

                    <!-- Table Headings -->
                    <thead>
                        <th>Obras</th>
                        <th>&nbsp;</th>
     
                    </thead>

                    <!-- Table Body -->
                    <tbody>
                        @foreach ($obras as $obra)
                            <tr>
                                <!-- Task Name -->
                                <td class="table-text">
                                    
                                   
                                    <div><a href="{{ route('editObra', $obra->id ) }}">{{ $obra->nombre }}</a></div>
                                </td>

                                
                                
                                <td>
                                    
                                    <!-- TODO: Delete Button -->
                                 <div><a href="{{ route('deleteObra', $obra->id ) }}" class="btn btn-danger" role="button">Eliminar
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
