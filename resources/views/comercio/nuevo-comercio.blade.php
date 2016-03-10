@extends('layouts.app')

@section('title')
    <title> Comercios </title>
@endsection

@section('content')
<div class="container">
    <div class="content">
        <h1>Nuevo Comercio</h1>
        <div class="wrap comercio">
            <form action="/alta-comercio" method="POST" class="form-horizontal">
                <div class="form-group"><label for="nombre" class="col-md-3">Nombre</label><input type="text" id="nombre" name="nombre" ></div>
                <div class="form-group"><label for="email" class="col-md-3">Email</label><input type="text" id="email" name="email" ></div>
                <div class="form-group"><label for="image" class="col-md-3" style="display: inline-block;">Imagen</label><input type="file" id="image" name="image" style="display: inline-block;" ></div>
                <div class="form-group"><label class="col-md-3" for="pass">Contraseña</label><input type="password" id="pass" name="pass" ></div>
                <div class="form-group"><label class="col-md-3" for="pass2">Confirmar</label><input type="password" id="pass2" name="pass2" ></div>
                <div class="text-center"><input type="checkbox"><label for="">Acepto Terminos</label></div>
                <div class="text-center"><button type="submit" class="btn btn-default">Suscribite</button></div>
            </form>
        </div>
        </div>
    </div>
</div>  
@endsection