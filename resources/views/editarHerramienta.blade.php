@extends('layouts.app')

@section('title')
Modificar
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
        
         {!! Form::open(array('action' => 'HerramientasController@agregarImagen', 'files' => true)) !!}
         {!! Form::hidden('id',$Herramienta->id) !!}
        <h5><strong>Fotográfias:</strong></h5>   
        
           
                
                        
 
    @foreach( $photos as $photo )
       <div class="form-group">
     
           <img class="img-fluid" src="{{url("uploaded_folder/fotos_herramientas/{$photo->id_herramienta}/{$photo->archivo}") }}" alt="{{ $photo->title }}" height="140" width="120">
              <div class="col-md-6">
                 <h3>{{ $photo->title }}</h3>
                 <h5>{{ $photo->descriptoin }}</h5>
              
           </div>
       </div>
    @endforeach
   
     
<br/>       
       
 <hr style='border-width: 4px; background-color:#f3f6db; color:#f3f6db;'>         
             <h5><strong>Agregar otras imagénes:</strong></h5> 
 <hr style='border-width: 4px; background-color:#f3f6db; color:#f3f6db;'>    
 
        <div id='image-holder3' style='display: inline-block;width:120px;height:140px;border:1px solid black;'></div>
                   
    
   
    {!! Form::file('image',['class' => 'form-control','id'=>'imageFotoUpload3']) !!}    
       <br/>
     
      
                 <div class="form-group">
        {!! Form::label('label1', 'Titulo:',['class' => 'col-md-1 control-label']); !!}
        <div class="col-md-4">
        {!! Form::text('title', '', ['class' => 'form-control']); !!}
          
                    </div>
                 </div>
             
               <div class='clearfix'></div>
                <br/>
    
      
                        <div class="form-group">
        {!! Form::label('label1', 'Descripción:',['class' => 'col-md-1 control-label']); !!}
         {!! Form::textarea('description', '', ['class' => 'form-control', 'rows'=>'4']); !!}
          
        
                    </div>
                
      {!! Form::submit('Agregar imagén'); !!}
     {!! Form::close() !!}   
        
     
                    {!! Form::open(array('action' => 'HerramientasController@modificar', 'files' => true)) !!}
                     {!! Form::hidden('id',$Herramienta->id) !!}
              
                        

 


                      
        
                <hr style='border-width: 4px; background-color:#f3f6db; color:#f3f6db;'>         
             <h5><strong>Información de la herramienta:</strong></h5> 
 <hr style='border-width: 4px; background-color:#f3f6db; color:#f3f6db;'>    
 
             
             
             <br/>
             
                 <div class="form-group @if ($errors->has('clave')) has-error @endif">
        {!! Form::label('label1', 'Clave:',['class' => 'col-md-1 control-label']); !!}
        <div class="col-md-4">
        {!! Form::text('clave', $Herramienta->clave, ['class' => 'form-control']); !!}
          @if ($errors->has('clave')) <p class="help-block">{{ $errors->first('clave') }}</p> @endif
 
                    </div>
                 </div>
             
               <div class='clearfix'></div>
                <br/>
               
                       <div class="form-group @if ($errors->has('desc')) has-error @endif">
        {!! Form::label('label1', 'Descripción:',['class' => 'col-md-1 control-label']); !!}
         {!! Form::textarea('desc', $Herramienta->desc, ['class' => 'form-control', 'rows'=>'4']); !!}
          @if ($errors->has('desc')) <p class="help-block">{{ $errors->first('desc') }}</p> @endif
        
                    </div>
                    
             <h5><strong>Características:</strong></h5> 
 <hr style='border-width: 4px; background-color:#f3f6db; color:#f3f6db;'>    
 
                       <div class="form-group @if ($errors->has('desc')) has-error @endif">
        {!! Form::label('label1', 'Marca:',['class' => 'col-md-2 control-label']); !!}
         <div class="col-md-4">
        {!! Form::text('marca', $Herramienta->marca, ['class' => 'form-control']); !!}
         @if ($errors->has('marca')) <p class="help-block">{{ $errors->first('marca') }}</p> @endif
                    </div>
                       </div>
 
  <div class='clearfix'></div>
                <br/>
             
 
               <div class="form-group @if ($errors->has('modelo')) has-error @endif">
        {!! Form::label('label1', 'Modelo:',['class' => 'col-md-2 control-label']); !!}
        <div class="col-md-4">
        {!! Form::text('modelo', $Herramienta->modelo, ['class' => 'form-control']); !!}
         @if ($errors->has('modelo')) <p class="help-block">{{ $errors->first('modelo') }}</p> @endif
                    </div>
                     </div>
   <div class='clearfix'></div>
                <br/>
                           
                
               <div class="form-group">
        {!! Form::label('label1', 'Capacidad:',['class' => 'col-md-2 control-label']); !!}
        <div class="col-md-4">
        {!! Form::text('capacidad', $Herramienta->capacidad, ['class' => 'form-control']); !!}
               </div>       
               </div>
                
    <div class='clearfix'></div>
                <br/>
                 
 <hr style='border-width: 4px; background-color:#f3f6db; color:#f3f6db;'>    
 
 
 
                  <div class="form-group">
{!! Form::label('label22', 'Tipo de la herramienta:', ['class' => 'col-md-3 control-label']); !!}
<div class="col-md-4">
{!! Form::select('id_tipo', $catalogosHerramienta, $Herramienta->id_tipo, ['class' => 'form-control']); !!}
</div>
</div>     
                    <div class='clearfix'></div>        
 
 
  <hr style='border-width: 4px; background-color:#f3f6db; color:#f3f6db;'>    
 
 
 
                  <div class="form-group">
{!! Form::label('label22', 'Estado de la herramienta:', ['class' => 'col-md-3 control-label']); !!}
<div class="col-md-4">
{!! Form::select('id_estadoequipo', $estadosHerramienta, $Herramienta->id_estadoequipo, ['class' => 'form-control']); !!}
</div>
</div>     
                    <div class='clearfix'></div>     
                    
                    
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
{!! Form::label('label22', 'Ubicación de la herramienta:', ['class' => 'col-md-4 control-label']); !!}
<div class="col-md-4">
{!! Form::select('id_obra', $ubicaciones, $Herramienta->id_obra, ['class' => 'form-control']); !!}
</div>
</div>     
                    <div class='clearfix'></div>          
  <br/>
                     
                    
 
 <hr style='border-width: 4px; background-color:#f3f6db; color:#f3f6db;'>                     
                    
         <div class="form-group @if ($errors->has('costo')) has-error @endif">
        {!! Form::label('label1', 'Costo:',['class' => 'col-md-1 control-label']); !!}
        <div class="col-md-4">
        {!! Form::text('costo', $Herramienta->costo, ['class' => 'form-control']); !!}
         @if ($errors->has('costo')) <p class="help-block">{{ $errors->first('costo') }}</p> @endif
        </div>
                    </div>

   <div class='clearfix'></div>  <br/>
   
         <div class="form-group @if ($errors->has('cantidad')) has-error @endif">
        {!! Form::label('label1', 'Cantidad:',['class' => 'col-md-2 control-label']); !!}
        <div class="col-md-4">
        {!! Form::text('cantidad', $Herramienta->cantidad, ['class' => 'form-control']); !!}
         @if ($errors->has('cantidad')) <p class="help-block">{{ $errors->first('cantidad') }}</p> @endif
        </div>
                    </div>

  <div class='clearfix'></div>  <br/>
  
  
  
  
  
  <div class="form-group">
                
        {!! Form::label('label1', 'Supervisor y Fecha:'); !!}
        {!! Form::date('supervisor', \Carbon\Carbon::now()); !!}
        
        
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
