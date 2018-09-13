@extends('layouts.app')

@section('title')
Ubicaciones de la herramienta
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

                   
<h5>{{ $herramienta->desc }}</h5>

                    <table class="table table-striped task-table">

                    <!-- Table Headings -->
                    <thead>
                        <th>Ubicación</th>
                        <th>Responsable</th>
                        <th>De:</th>
                        <th>Hasta:</th>
                        
     
                    </thead>

                    <!-- Table Body -->
                    <tbody>
                        @foreach ($ubicaciones as $ubicacion)
                            <tr>
                                <!-- Task Name -->
                                
                                
                                
                                <td class="table-text">
                                       <div>{{ $ubicacion->obra->nombre }}</div>
                                </td>

                                 <td class="table-text">
                                       <div>{{ $ubicacion->responsable->nombre }}</div>
                                </td>

                               
                                 <td class="table-text">
                                       <div> {{ \Carbon\Carbon::parse($ubicacion->started_at)->format('d/m/Y')}}</div>
                                </td>

                                 <td class="table-text">
                                     <div>@if ($ubicacion->ended_at) {{ \Carbon\Carbon::parse($ubicacion->ended_at)->format('d/m/Y')}} @else ----- @endif</div>
                                        
                              
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
