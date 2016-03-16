@extends('layouts.app')

@section('title')
    <title> Comercios </title>
@endsection

@section('content')
<div class="container">
    <div class="content">
        <h1>Nuevo Comercio</h1>
        
            <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-body">

            <form action="/alta-comercio" method="POST" class="form-horizontal">
                <div class="form-group">
                    <label for="nombre" class="col-md-4 control-label">Nombre</label>
                    <input type="text" id="nombre" name="nombre" class="col-md-5 form-control1"></div>
                <div class="form-group">
                    <label for="email" class="col-md-4 control-label">Email</label>
                    <input type="text" id="email" name="email" class="col-md-5 form-control1"></div>
                <div class="form-group">
                    <label for="pass" class="col-md-4 control-label">Contraseña</label>
                    <input type="password" id="pass" name="pass" class="col-md-5 form-control1"></div>
                <div class="form-group">
                    <label for="pass2" class="col-md-4 control-label">Confirmar</label>
                    <input type="password" id="pass2" name="pass2" class="col-md-5 form-control1"></div>
                <div class="text-center">
                    <input type="checkbox">
                    <label for="">Acepto Terminos</label></div>
                <div class="text-center"><button type="submit" class="btn btn-default">Suscribite</button></div>
            </form>

                </div>
            </div>
            </div>


        
        </div>
    </div>
</div>  
@endsection