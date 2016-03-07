@extends('layouts.app')
@section('title')
    <title> Promocion </title>
@endsection
@section('content')
<div class="content">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
                        {!! csrf_field() !!}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="name">
                            </div>
                        </div>
                        
                        <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Descripcion</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="description">
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Precio</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="price">
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('final') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Precio final</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="final">
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('cp') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Imagen</label>

                            <div class="col-md-6">
                                <input type="file" name="image" id="image">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-user"></i>Agregar
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection