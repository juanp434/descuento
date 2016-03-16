@extends('layouts.app')
@section('title')
    <title> Promocion </title>
@endsection
@section('content')
<div class="content">
    <h1>Alta promocion</h1>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-body">
                    
                    {{ Form::open(array('url'=>'/alta-promocion','files'=>true, 'class'=>'form-horizontal', 'method'=>'POST')) }}
                        {!! csrf_field() !!}

                        <div class="form-group">
                            {{ Form::label('name','Nombre',array('id'=>'','class'=>'col-md-4 control-label')) }}
                            <div class="col-md-6">
                                {{ Form::text('name','',array('id'=>'file','class'=>'form-control1')) }}
                            </div>
                        </div>
                        
                        <div class="form-group">
                            {{ Form::label('des','Descripcion',array('id'=>'','class'=>'col-md-4 control-label')) }}
                            <div class="col-md-6">
                                {{ Form::text('description','',array('id'=>'file','class'=>'form-control1')) }}
                            </div>
                        </div>

                        <div class="form-group">
                            {{ Form::label('price','Precio',array('id'=>'','class'=>'col-md-4 control-label')) }}
                            <div class="col-md-6">
                                {{ Form::text('price','',array('id'=>'file','class'=>'form-control1')) }}
                            </div>
                        </div>

                        <div class="form-group">
                            {{ Form::label('fin','Precio final',array('id'=>'','class'=>'col-md-4 control-label')) }}
                            <div class="col-md-6">
                                {{ Form::text('final','',array('id'=>'file','class'=>'form-control1')) }}
                            </div>
                        </div>
                        <div class="form-group">
                            {{ Form::label('file','Imagen',array('id'=>'','class'=>'col-md-4 control-label')) }}
                            <div class="col-md-6">
                                {{ Form::file('image','',array('id'=>'file','class'=>'col-md-4 control-label')) }}
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                             {{ Form::submit('Guardar',array('id'=>'','class'=>'btn btn-default')) }}
                            </div>
                        </div>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection