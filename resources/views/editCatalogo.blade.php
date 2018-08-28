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

                    
                    {!! Form::open(array('action' => 'CatalogosController@modificar')) !!}
                    
                    <div class="form-group">
        {!! Form::hidden('id', $Catalogo->id); !!}                
        {!! Form::label('label1', 'Descripción:'); !!}
        {!! Form::text('desc', $Catalogo->desc, ['class' => 'form-control']); !!}
                    </div>

                    
                  {!! Form::submit('Modificar'); !!}
            </div>
                    
                    
                    
                    
                </div>
            </div>
        </div>
    </div>

@endsection
