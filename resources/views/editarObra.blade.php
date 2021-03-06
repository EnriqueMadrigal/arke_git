@extends('layouts.app')

@section('title')
Editar
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

            
                    
                    {!! Form::open(array('action' => 'ObrasController@modificar')) !!}
                    {!! Form::hidden('id', $Obra->id); !!}
                    
                    <div class="form-group">
        {!! Form::label('label1', 'Nombre:', ['class' => 'col-md-2 control-label']); !!}
        {!! Form::text('nombre', $Obra->nombre, ['class' => 'form-control']); !!}
                    </div>

   
                   <div class="form-group">
        {!! Form::label('label2', 'Descripción:', ['class' => 'col-md-2 control-label']); !!}
        {!! Form::textarea('desc', $Obra->desc, ['class' => 'form-control', 'rows'=>'4']); !!}

                    </div>

           
                  <div class="form-group">
{!! Form::label('label22', 'Estado de la obra:', ['class' => 'col-md-3 control-label']); !!}
<div class="col-md-4">
{!! Form::select('id_estado', $estadosObra, $Obra->id_estado, ['class' => 'form-control']); !!}
</div>
</div>     
                    <div class='clearfix'></div>                  

  <hr style='border-width: 4px; background-color:#f3f6db; color:#f3f6db;'>

<h5><strong>Dirección:</strong></h5>    
<br/>                   
                    
                       <div class="form-group">
        {!! Form::label('label3', 'Calle:', ['class' => 'col-md-2 control-label']); !!}
        {!! Form::text('calle', $Obra->calle, ['class' => 'form-control']); !!}
                    </div>
           
         <div class="form-group">
        {!! Form::label('label4', 'Número Exterior:', ['class' => 'col-md-3 control-label']); !!}
     <div class="col-md-2">
        {!! Form::text('numero_ext', $Obra->numero_ext, ['class' => 'form-control']); !!}
     </div>
        </div>
      
      <div class="form-group">
        {!! Form::label('label41', 'Número Interior:', ['class' => 'col-md-3 control-label']); !!}
     <div class="col-md-2">
        {!! Form::text('numero_int', $Obra->numero_int, ['class' => 'form-control']); !!}
     </div>
        </div>
      
 <div class='clearfix'></div>  
 
                      <div class="form-group">
        {!! Form::label('label4', 'Colonia:', ['class' => 'col-md-4 control-label']); !!}
        {!! Form::text('colonia', $Obra->colonia, ['class' => 'form-control']); !!}
                    </div>
            
                  
                      <div class="form-group">
        {!! Form::label('label5', 'Municipio/Delegacion:', ['class' => 'col-md-2 control-label']); !!}
        {!! Form::text('municipio', $Obra->municipio, ['class' => 'form-control']); !!}
                    </div>
                    
                  <div class="form-group">
{!! Form::label('label6', 'Estado:', ['class' => 'col-md-2 control-label']); !!}
<div class="col-md-4">
{!! Form::select('id_estado_mex', $estadosMexico, $Obra->id_estado_mex, ['class' => 'form-control']); !!}
</div>
</div>     
                    <div class='clearfix'></div>           
                    
                  <hr style='border-width: 4px; background-color:#f3f6db; color:#f3f6db;'>

<h5><strong>Contacto:</strong></h5>    

                <div class="form-group">
        {!! Form::label('label51', 'Nombre del contacto:', ['class' => 'col-md-4 control-label']); !!}
        {!! Form::text('contacto', $Obra->contacto, ['class' => 'form-control']); !!}
                    </div>
    

<div class="form-group">
{!! Form::label('label7', 'Teléfono:', ['class' => 'col-md-2 control-label']); !!}
<div class="col-md-4">
{!! Form::text('tel1', $Obra->tel1, ['class' => 'form-control','title'=>'Teléfono de la empresa.']); !!}
</div>
</div>      

 <div class='clearfix'></div>  
 
 <div class="form-group">
{!! Form::label('label8', 'Teléfono:', ['class' => 'col-md-2 control-label']); !!}
<div class="col-md-4">
{!! Form::text('tel2', $Obra->tel2, ['class' => 'form-control','title'=>'Teléfono de la empresa.']); !!}
</div>
</div>      

 <div class='clearfix'></div>  
 <div class="form-group">
{!! Form::label('label8', 'Teléfono:', ['class' => 'col-md-2 control-label']); !!}
<div class="col-md-4">
{!! Form::text('tel3', $Obra->tel3, ['class' => 'form-control','title'=>'Teléfono de la empresa.']); !!}
</div>
</div>      

 <div class='clearfix'></div>  
 
 
 
                    
                  {!! Form::submit('Modificar'); !!}
            </div>
                    
                    
                    
                    
                </div>
            </div>
        </div>
    </div>

@endsection
