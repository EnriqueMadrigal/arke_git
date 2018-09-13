@extends('layouts.app')

@section('title')
Cambiar la ubicación
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
        
      
     
                    {!! Form::open(array('action' => 'UbicacionesController@cambiar', 'files' => true)) !!}
                     {!! Form::hidden('id',$Herramienta->id) !!}
              
                           
        
                <hr style='border-width: 4px; background-color:#f3f6db; color:#f3f6db;'>         
             <h5>Herramienta: <strong>{{ $Herramienta->desc }}</strong></h5> 
 <hr style='border-width: 4px; background-color:#f3f6db; color:#f3f6db;'>    
 
             
      
         
 
 
 
 
                  <div class="form-group">
{!! Form::label('label22', 'Responsable:', ['class' => 'col-md-3 control-label']); !!}
<div class="col-md-4">
{!! Form::select('id_responsable', $responsables, $Herramienta->id_responsable, ['class' => 'form-control']); !!}
</div>
</div>     
                    <div class='clearfix'></div> 
 <hr style='border-width: 4px; background-color:#f3f6db; color:#f3f6db;'>    
 
 
 
                  <div class="form-group">
{!! Form::label('label22', 'Ubicación de la herramienta:', ['class' => 'col-md-3 control-label']); !!}
<div class="col-md-4">
{!! Form::select('id_obra', $ubicaciones, $Herramienta->id_obra, ['class' => 'form-control']); !!}
</div>
</div>     
                    <div class='clearfix'></div>          
  <br/>
                     
   <div class="form-group">
                
        {!! Form::label('label1', 'Fecha:', ['class' => 'col-md-3 control-label']); !!}
        {!! Form::date('fecha', \Carbon\Carbon::now()); !!}
        
        
                    </div>                  
 
  
  
 
 <br/><br/>
 
                  {!! Form::submit('Modificar'); !!}
                  {!! Form::close() !!}
            </div>
                    
                    
                    
                    
                </div>
            </div>
        </div>
    </div>

@endsection
