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

                    
                    {!! Form::open(array('action' => 'CatalogosController@agregar')) !!}
                    
                    <div class="form-group">
                
        {!! Form::label('label1', 'Descripción:'); !!}
        {!! Form::text('desc', '', ['class' => 'form-control']); !!}
                    </div>

                    
                  {!! Form::submit('Agregar'); !!}
            </div>
                    
                    
                    
                    
                </div>
            </div>
        </div>
    </div>

@endsection
