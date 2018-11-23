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

                    
                    {!! Form::open(array('action' => 'CatalogosController@agregar' , 'files' => true)) !!}
                    
                    <div class="form-group">
                
        {!! Form::label('label1', 'Descripción:'); !!}
        {!! Form::text('desc', '', ['class' => 'form-control']); !!}
                    </div>

                    
                         
                <h5><strong>Fotográfia:</strong></h5>     
                    <div class="col-md-8">
    <div id='image-holder' style='display: inline-block;width:112px;height:142px;border:1px solid black;'></div>
    
    
    <br>
    {!! Form::file('image',['class' => 'form-control','id'=>'imageFotoUpload']) !!}

</div>
                
                   <div class='clearfix'></div>  
                <br>
                    
                  {!! Form::submit('Agregar'); !!}
            </div>
                    
                    
                    
                    
                </div>
            </div>
        </div>
    </div>

@endsection
