@extends('layouts.app')

@section('title')
Agregar Usuario de APP
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
                    
                    
         {!! Form::open(array('action' => 'UsuariosController@agregar', 'files' => true)) !!}
              

             <div class='clearfix'></div>              
                    
             
       
             <h5><strong>Información del usuario:</strong></h5> 
 <hr style='border-width: 4px; background-color:#f3f6db; color:#f3f6db;'>    
 
             
                 <div class="form-group @if ($errors->has('nombre')) has-error @endif">
        {!! Form::label('label1', 'Nombre:',['class' => 'col-md-2 control-label']); !!}
        <div class="col-md-4">
        {!! Form::text('nombre', '', ['class' => 'form-control']); !!}
          @if ($errors->has('nombre')) <p class="help-block">{{ $errors->first('nombre') }}</p> @endif
 
                    </div>
                 </div>
             
               <div class='clearfix'></div>
                <br/>
     
                
   
      <div class="form-group @if ($errors->has('apellidos')) has-error @endif">
        {!! Form::label('label2', 'Apellidos:',['class' => 'col-md-2 control-label']); !!}
        <div class="col-md-4">
        {!! Form::text('apellidos', '', ['class' => 'form-control']); !!}
          @if ($errors->has('apellidos')) <p class="help-block">{{ $errors->first('apellidos') }}</p> @endif
 
                    </div>
                 </div>
             
               <div class='clearfix'></div>
                <br/>
     
   
                
  
      <div class="form-group @if ($errors->has('tel')) has-error @endif">
        {!! Form::label('label3', 'Teléfono:',['class' => 'col-md-2 control-label']); !!}
        <div class="col-md-4">
        {!! Form::text('tel', '', ['class' => 'form-control']); !!}
          @if ($errors->has('tel')) <p class="help-block">{{ $errors->first('tel') }}</p> @endif
 
                    </div>
                 </div>
             
               <div class='clearfix'></div>
                <br/>
     
 
             
             <h5><strong>Información de la cuenta:</strong></h5> 
          <hr style='border-width: 4px; background-color:#f3f6db; color:#f3f6db;'>           
   
   <div class="form-group @if ($errors->has('username')) has-error @endif">
        {!! Form::label('labe14', 'Username:',['class' => 'col-md-2 control-label']); !!}
        <div class="col-md-4">
        {!! Form::text('username', '', ['class' => 'form-control']); !!}
          @if ($errors->has('username')) <p class="help-block">{{ $errors->first('username') }}</p> @endif
 
                    </div>
                 </div>
             
               <div class='clearfix'></div>
                <br/>
     
 
             
      <div class="form-group @if ($errors->has('password')) has-error @endif">
        {!! Form::label('labe15', 'Password:',['class' => 'col-md-2 control-label']); !!}
        <div class="col-md-4">
        {!! Form::password('password', ['class' => 'form-control']); !!}
          @if ($errors->has('password')) <p class="help-block">{{ $errors->first('password') }}</p> @endif
 
                    </div>
                 </div>
             
               <div class='clearfix'></div>
                <br/>           
                
     
     
                  <div class="form-group">
{!! Form::label('label22', 'Estado:', ['class' => 'col-md-3 control-label']); !!}
<div class="col-md-4">
{!! Form::select('id_estado', $estadosusuario, 1, ['class' => 'form-control']); !!}
</div>
</div>     
                    <div class='clearfix'></div>        
 
                    <br>
                        <div class="form-group">
{!! Form::label('label23', 'Permisos:', ['class' => 'col-md-3 control-label']); !!}
<div class="col-md-4">
{!! Form::select('id_permiso', $permisosusuario, 1, ['class' => 'form-control']); !!}
</div>
</div>     
                    <div class='clearfix'></div>        
                    
   <hr style='border-width: 4px; background-color:#f3f6db; color:#f3f6db;'>         
           
                
     <div class="form-group @if ($errors->has('desc')) has-error @endif">
        {!! Form::label('label1', 'Descripción:',['class' => 'col-md-1 control-label']); !!}
         {!! Form::textarea('desc', '', ['class' => 'form-control', 'rows'=>'4']); !!}
          @if ($errors->has('desc')) <p class="help-block">{{ $errors->first('desc') }}</p> @endif
        
                    </div>
     
             
 
               
   
      
   
  
 
 
 <br/><br/>
 
                  {!! Form::submit('Agregar'); !!}
            </div>
                    
                    
                    
                    
                </div>
            </div>
        </div>
    </div>

@endsection
