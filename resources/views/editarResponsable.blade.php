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

                    
                    {!! Form::open(array('action' => 'ResponsablesController@modificar', 'files' => true)) !!}
                      {!! Form::hidden('id', $Responsable->id); !!}                
     
                <h5><strong>Fotográfia:</strong></h5>     
                    <div class="col-md-8">
                        <div id='image-holder' style='display: inline-block;width:112px;height:142px;border:1px solid black;'>
                        
                         <img src="{!! $curpath !!}" height="142" width="112">
                        </div>
    
    
    <br>
    {!! Form::file('image',['class' => 'form-control','id'=>'imageFotoUpload']) !!}

</div>

             <div class='clearfix'></div>              
                    
                       <div class="form-group">
        {!! Form::label('label1', 'Nombre:'); !!}
        {!! Form::text('nombre', $Responsable->nombre, ['class' => 'form-control']); !!}
                    </div>
                    
                          
                       <div class="form-group">
        {!! Form::label('label1', 'Apellidos:'); !!}
        {!! Form::text('apellidos', $Responsable->apellidos, ['class' => 'form-control']); !!}
                    </div>
                    
                     <div class="form-group">
        {!! Form::label('label1', 'Teléfono:'); !!}
        {!! Form::text('tel', $Responsable->tel, ['class' => 'form-control']); !!}
                    </div>
          
                    
                    
                    <div class="form-group">
                
        {!! Form::label('label1', 'Comentarios:'); !!}
        {!! Form::textarea('desc', $Responsable->desc, ['class' => 'form-control', 'rows'=>'4']); !!}
        
        
                    </div>

                    
                  {!! Form::submit('Modificar'); !!}
            </div>
                    
                    
                    
                    
                </div>
            </div>
        </div>
    </div>

@endsection
