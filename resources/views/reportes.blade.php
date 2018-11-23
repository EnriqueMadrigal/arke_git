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
 

                    <table class="table table-striped task-table">

                    <!-- Table Headings -->
                    <thead>
                        <tr>
                       <th>Tipo de Reporte
                        </th>
                        </tr>
     
                    </thead>

                    <!-- Table Body -->
                    <tbody>
                            <tr>
                                <td class="table-text">
                               <div><a href="{{ route('reporteGeneral') }}">Reporte General </a></div>
                                </td>
                            </tr>     
                                      
                              
                            <tr>
                                <td class="table-text">
                               <div><a href="{{ route('reporteObra') }}">Reporte por Obra </a></div>
                                </td>
                            </tr>     
                       
                                 <tr>
                                <td class="table-text">
                               <div><a href="{{ route('reporteResponsable') }}">Reporte por Encargado </a></div>
                                </td>
                            </tr>     
                       
                              <tr>
                                <td class="table-text">
                               <div><a href="{{ route('reporteSinObra') }}">Reporte de Herramientas sin asignación de Obra</a></div>
                                </td>
                            </tr>     
                       
                             <tr>
                                <td class="table-text">
                               <div><a href="{{ route('reporteSinResponsable') }}">Reporte de Herramientas sin asignación de Encargado</a></div>
                                </td>
                            </tr>     
                       
                            
                              
                        
                    </tbody>
                </table>
            </div>
                    
                    
                    
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
