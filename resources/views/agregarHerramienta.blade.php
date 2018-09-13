@extends('layouts.app')

@section('title')
Agregar
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
                    
                    
                    {!! Form::open(array('action' => 'HerramientasController@agregar', 'files' => true)) !!}
                    
                <h5><strong>Fotográfia:</strong></h5>     
                    <div class="col-md-8">
    <div id='image-holder2' style='display: inline-block;width:220px;height:280px;border:1px solid black;'></div>
    
    
    <br>
    {!! Form::file('image',['class' => 'form-control','id'=>'imageFotoUpload2']) !!}

</div>

             <div class='clearfix'></div>              
                    
             
           <hr style='border-width: 4px; background-color:#f3f6db; color:#f3f6db;'>         
             <h5><strong>Información de la herramienta:</strong></h5> 
 <hr style='border-width: 4px; background-color:#f3f6db; color:#f3f6db;'>    
 
             
                 <div class="form-group @if ($errors->has('clave')) has-error @endif">
        {!! Form::label('label1', 'Clave:',['class' => 'col-md-1 control-label']); !!}
        <div class="col-md-4">
        {!! Form::text('clave', '', ['class' => 'form-control']); !!}
          @if ($errors->has('clave')) <p class="help-block">{{ $errors->first('clave') }}</p> @endif
 
                    </div>
                 </div>
             
               <div class='clearfix'></div>
                <br/>
               
                       <div class="form-group @if ($errors->has('desc')) has-error @endif">
        {!! Form::label('label1', 'Descripción:',['class' => 'col-md-1 control-label']); !!}
         {!! Form::textarea('desc', '', ['class' => 'form-control', 'rows'=>'4']); !!}
          @if ($errors->has('desc')) <p class="help-block">{{ $errors->first('desc') }}</p> @endif
        
                    </div>
                    
             <h5><strong>Características:</strong></h5> 
 <hr style='border-width: 4px; background-color:#f3f6db; color:#f3f6db;'>    
 
                       <div class="form-group @if ($errors->has('desc')) has-error @endif">
        {!! Form::label('label1', 'Marca:',['class' => 'col-md-2 control-label']); !!}
         <div class="col-md-4">
        {!! Form::text('marca', '', ['class' => 'form-control']); !!}
         @if ($errors->has('marca')) <p class="help-block">{{ $errors->first('marca') }}</p> @endif
                    </div>
                       </div>
 
  <div class='clearfix'></div>
                <br/>
             
 
               <div class="form-group @if ($errors->has('modelo')) has-error @endif">
        {!! Form::label('label1', 'Modelo:',['class' => 'col-md-2 control-label']); !!}
        <div class="col-md-4">
        {!! Form::text('modelo', '', ['class' => 'form-control']); !!}
         @if ($errors->has('modelo')) <p class="help-block">{{ $errors->first('modelo') }}</p> @endif
                    </div>
                     </div>
   <div class='clearfix'></div>
                <br/>
                           
                
               <div class="form-group">
        {!! Form::label('label1', 'Capacidad:',['class' => 'col-md-2 control-label']); !!}
        <div class="col-md-4">
        {!! Form::text('capacidad', '', ['class' => 'form-control']); !!}
               </div>       
               </div>
                
    <div class='clearfix'></div>
                <br/>
                 
 <hr style='border-width: 4px; background-color:#f3f6db; color:#f3f6db;'>    
 
 
 
                  <div class="form-group">
{!! Form::label('label22', 'Tipo de la herramienta:', ['class' => 'col-md-3 control-label']); !!}
<div class="col-md-4">
{!! Form::select('id_tipo', $catalogosHerramienta, 1, ['class' => 'form-control']); !!}
</div>
</div>     
                    <div class='clearfix'></div>        
 
 
  <hr style='border-width: 4px; background-color:#f3f6db; color:#f3f6db;'>    
 
 
 
                  <div class="form-group">
{!! Form::label('label22', 'Estado de la herramienta:', ['class' => 'col-md-3 control-label']); !!}
<div class="col-md-4">
{!! Form::select('id_estadoequipo', $estadosHerramienta, 1, ['class' => 'form-control']); !!}
</div>
</div>     
                    <div class='clearfix'></div>          
 <hr style='border-width: 4px; background-color:#f3f6db; color:#f3f6db;'>    
 
  <div class="form-group">
{!! Form::label('label22', 'Responsable:', ['class' => 'col-md-3 control-label']); !!}
<div class="col-md-4">
{!! Form::select('id_responsable', $responsables, 1, ['class' => 'form-control']); !!}
</div>
</div>     
                    <div class='clearfix'></div> 
 <hr style='border-width: 4px; background-color:#f3f6db; color:#f3f6db;'>    
 
                  <div class="form-group">
{!! Form::label('label22', 'Ubicación de la herramienta:', ['class' => 'col-md-4 control-label']); !!}
<div class="col-md-4">
{!! Form::select('id_obra', $ubicaciones, 1, ['class' => 'form-control']); !!}
</div>
</div>     
                    <div class='clearfix'></div>          
  <br/>
  
 <hr style='border-width: 4px; background-color:#f3f6db; color:#f3f6db;'>                     
                    
         <div class="form-group @if ($errors->has('costo')) has-error @endif">
        {!! Form::label('label1', 'Costo:',['class' => 'col-md-1 control-label']); !!}
        <div class="col-md-4">
        {!! Form::text('costo', '', ['class' => 'form-control']); !!}
         @if ($errors->has('costo')) <p class="help-block">{{ $errors->first('costo') }}</p> @endif
        </div>
                    </div>

   <div class='clearfix'></div>  <br/>
   
         <div class="form-group @if ($errors->has('cantidad')) has-error @endif">
        {!! Form::label('label1', 'Cantidad:',['class' => 'col-md-2 control-label']); !!}
        <div class="col-md-4">
        {!! Form::text('cantidad', '', ['class' => 'form-control']); !!}
         @if ($errors->has('cantidad')) <p class="help-block">{{ $errors->first('cantidad') }}</p> @endif
        </div>
                    </div>

  <div class='clearfix'></div>  <br/>
  
   
  
  
  <div class="form-group">
                
        {!! Form::label('label1', 'Supervisor y Fecha:'); !!}
        {!! Form::date('supervisor', \Carbon\Carbon::now()); !!}
        
        
                    </div>
 
 <br/><br/>
 
                  {!! Form::submit('Agregar'); !!}
            </div>
                    
                    
                    
                    
                </div>
            </div>
        </div>
    </div>

@endsection
