@extends('layouts.app')

@section('title')
Editar Usuario de APP
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
                    
                    
         {!! Form::open(array('action' => 'UsuariosController@modificar', 'files' => true)) !!}
                {!! Form::hidden('id', $Usuario->id); !!}       

             <div class='clearfix'></div>              
                    
             
       
             <h5><strong>Información del usuario:</strong></h5> 
 <hr style='border-width: 4px; background-color:#f3f6db; color:#f3f6db;'>    
 
             
                 <div class="form-group">
        {!! Form::label('label1', 'Nombre:',['class' => 'col-md-2 control-label']); !!}
        <div class="col-md-4">
        {!! Form::text('nombre', $Usuario->nombre, ['class' => 'form-control']); !!}
          
 
                    </div>
                 </div>
             
               <div class='clearfix'></div>
                <br/>
     
                
   
      <div class="form-group">
        {!! Form::label('label2', 'Apellidos:',['class' => 'col-md-2 control-label']); !!}
        <div class="col-md-4">
        {!! Form::text('apellidos', $Usuario->apellidos, ['class' => 'form-control']); !!}
         
 
                    </div>
                 </div>
             
               <div class='clearfix'></div>
                <br/>
     
   
                
  
      <div class="form-group">
        {!! Form::label('label3', 'Teléfono:',['class' => 'col-md-2 control-label']); !!}
        <div class="col-md-4">
        {!! Form::text('tel', $Usuario->tel, ['class' => 'form-control']); !!}
         
                    </div>
                 </div>
             
               <div class='clearfix'></div>
                <br/>
     
 
             
             <h5><strong>Información de la cuenta:</strong></h5> 
          <hr style='border-width: 4px; background-color:#f3f6db; color:#f3f6db;'>           
   
   <div class="form-group">
        {!! Form::label('labe14', 'Username:',['class' => 'col-md-2 control-label']); !!}
        <div class="col-md-4">
        {!! Form::text('username', $Usuario->username, ['class' => 'form-control']); !!}
         
                    </div>
                 </div>
             
               <div class='clearfix'></div>
                <br/>
     
 
             
      <div class="form-group">
        {!! Form::label('labe15', 'Password:',['class' => 'col-md-2 control-label']); !!}
        <div class="col-md-4">
        {!! Form::password('password', ['class' => 'form-control']); !!}
          
                    </div>
                 </div>
             
               <div class='clearfix'></div>
                <br/>           
                
     
     
                  <div class="form-group">
{!! Form::label('label22', 'Estado:', ['class' => 'col-md-3 control-label']); !!}
<div class="col-md-4">
{!! Form::select('id_estado', $estadosusuario, $Usuario->id_estado, ['class' => 'form-control']); !!}
</div>
</div>     
                    <div class='clearfix'></div>        
 
                    <br>
                        <div class="form-group">
{!! Form::label('label23', 'Permisos:', ['class' => 'col-md-3 control-label']); !!}
<div class="col-md-4">
{!! Form::select('id_permiso', $permisosusuario, $Usuario->id_permiso, ['class' => 'form-control']); !!}
</div>
</div>     
                    <div class='clearfix'></div>        
                    
   <hr style='border-width: 4px; background-color:#f3f6db; color:#f3f6db;'>         
           
                
     <div class="form-group">
        {!! Form::label('label1', 'Descripción:',['class' => 'col-md-1 control-label']); !!}
         {!! Form::textarea('desc',$Usuario->desc, ['class' => 'form-control', 'rows'=>'4']); !!}
         
                    </div>
     
    
 
 <br/><br/>
 
                  {!! Form::submit('Modificar'); !!}
            </div>
                    
                    
                    
                    
                </div>
            </div>
        </div>
    </div>

@endsection

