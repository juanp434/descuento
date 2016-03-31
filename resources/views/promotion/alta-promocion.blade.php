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
                                <input type="text" name="name" class="form-control" required=""></input>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-md-4 control-label">Descipcion</label>
                            <div class="col-md-6">
                                <input type="text" name="description" class="form-control" required=""></input>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Precio</label>
                            <div class="col-md-6">
                                <input type="text" name="price" class="form-control" required=""></input>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Precio Final</label>
                            <div class="col-md-6">
                                <input type="text" name="final" class="form-control" required=""></input>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Imagen</label>
                            <div class="col-md-6">
                                <input type="file" class="col-md-12" name="image" id="image" style="padding-top: 5px;"></input>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Fecha Expiracion</label>
                            <div class="col-md-8">
                             <input type="date" min="{{date('Y-m-d')}}" value="{{date('Y-m-d')}}" name="myDate" class="col-md-4" style="margin-top: 5px;" required=""></input>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                             <button class="btn btn-default" type="submit">Guardar</button>
                            </div>
                        </div>

                   </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection