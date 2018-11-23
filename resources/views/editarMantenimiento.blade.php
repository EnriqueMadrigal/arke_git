@extends('layouts.app')

@section('title')
Modificar Mantenimiento
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

                    
                    
                    
                     @if ($errors->has('.'))
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
                {{ $error }}<br>        
            @endforeach
        </div>
        @endif
        
      
     
                    {!! Form::open(array('action' => 'MantenimientosController@modificar', 'files' => true)) !!}
                     {!! Form::hidden('id',$mantenimiento->id) !!}
              
                           
        
                <hr style='border-width: 4px; background-color:#f3f6db; color:#f3f6db;'>         
             <h5>Herramienta: <strong>{{ $Herramienta->desc }}</strong></h5> 
 <hr style='border-width: 4px; background-color:#f3f6db; color:#f3f6db;'>    
 
             
      
         
 
 
 
                     
   <div class="form-group">
                
        {!! Form::label('label1', 'Fecha:', ['class' => 'col-md-3 control-label']); !!}
        
        {!! Form::date('fecha',  \Carbon\Carbon::createFromDate($year,$month,$day)->format('Y-m-d')); !!}
 
           <div class='clearfix'></div>
                <br/>
             
        
       {!! Form::label('label1', 'Descripción del Mantenimiento:',['class' => 'col-md-6 control-label']); !!}
       
     {!! Form::textarea('desc', $mantenimiento->desc, ['class' => 'form-control', 'rows'=>'4']); !!}
            
        
        
                    </div>                  
 
  
  
 
 <br/><br/>
 
                  {!! Form::submit('Modiicar'); !!}
                  {!! Form::close() !!}
            </div>
                    
                    
                    
                    
                </div>
            </div>
        </div>
    </div>

@endsection
