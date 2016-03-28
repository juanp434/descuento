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
                    <form action="/alta-promocion" class="form-horizontal" method="POST" enctype="multipart/form-data">
                        {!! csrf_field() !!}

                        <div class="form-group">
                            <label class="col-md-4 control-label">Nombre</label>
                            <div class="col-md-6">
                                <input type="text" name="name" class="form-control1"></input>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-md-4 control-label">Descipcion</label>
                            <div class="col-md-6">
                                <input type="text" name="descripcion" class="form-control1"></input>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Precio</label>
                            <div class="col-md-6">
                                <input type="text" name="price" class="form-control1"></input>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Precio Final</label>
                            <div class="col-md-6">
                                <input type="text" name="final" class="form-control1"></input>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Imagen</label>
                            <div class="col-md-6">
                                {{ Form::file('image','',array('id'=>'file','class'=>'col-md-4 control-label')) }}
                            </div>
                        </div>
                        <div class="form-group">
                            {{ Form::label('fecha','Fecha Expiracion',array('id'=>'','class'=>'col-md-4 control-label')) }}
                            <div class="col-md-8">
                            {{ Form::date('myDate','',array('id'=>'myDate', 'class'=>'col-md-4 control-label', 'min'=> 'date("Y-m-d")' ))}}
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                             {{ Form::submit('Guardar',array('id'=>'','class'=>'btn btn-default')) }}
                            </div>
                        </div>

                   </form>
                </div>
                <div>
                    <input type="date" min="{{date('Y-m-d')}}" value="{{date('Y-m-d')}}"></input>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection