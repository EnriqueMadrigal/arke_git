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

                    
                    {!! Form::open(array('action' => 'ResponsablesController@agregar', 'files' => true)) !!}
                    
                <h5><strong>Fotográfia:</strong></h5>     
                    <div class="col-md-8">
    <div id='image-holder' style='display: inline-block;width:112px;height:142px;border:1px solid black;'></div>
    
    
    <br>
    {!! Form::file('image',['class' => 'form-control','id'=>'imageFotoUpload']) !!}

</div>

             <div class='clearfix'></div>              
                    
                       <div class="form-group">
        {!! Form::label('label1', 'Nombre:'); !!}
        {!! Form::text('nombre', '', ['class' => 'form-control']); !!}
                    </div>
                    
                          
                       <div class="form-group">
        {!! Form::label('label1', 'Apellidos:'); !!}
        {!! Form::text('apellidos', '', ['class' => 'form-control']); !!}
                    </div>
                    
                     <div class="form-group">
        {!! Form::label('label1', 'Teléfono:'); !!}
        {!! Form::text('tel', '', ['class' => 'form-control']); !!}
                    </div>
          
                    
                    
                    <div class="form-group">
                
        {!! Form::label('label1', 'Comentarios:'); !!}
        {!! Form::textarea('desc', '', ['class' => 'form-control', 'rows'=>'4']); !!}
        
        
                    </div>

                    
                  {!! Form::submit('Agregar'); !!}
            </div>
                    
                    
                    
                    
                </div>
            </div>
        </div>
    </div>

@endsection
