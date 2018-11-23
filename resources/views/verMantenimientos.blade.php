@extends('layouts.app')

@section('title')
Mantenimientos realizados 
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
                        <th>Fecha</th>
                        <th>Descripción</th>
                        
     
                    </thead>

                    <!-- Table Body -->
                    <tbody>
                        @foreach ($mantenimientos as $mantenimiento)
                            <tr>
                                <!-- Task Name -->
                                
                                 <td class="table-text">
                                     <div>
                                         <a href="{{ route('editMantenimiento', $mantenimiento->id ) }}" >  {{ \Carbon\Carbon::parse($mantenimiento->started_at)->format('d/m/Y')}}</a></div>
                                </td>
 
                                
                                <td class="table-text">
                                       <div>{{ $mantenimiento->desc }}</div>
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
