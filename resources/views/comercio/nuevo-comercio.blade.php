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
                <div class="input-group"><label for="nombre">Nombre</label><input type="text" id="nombre" name="nombre"></div>
                <div class="input-group"><label for="email">Email</label><input type="text" id="email" name="email"></div>
                <div class="input-group"><label for="pass">Contraseña</label><input type="password" id="pass" name="pass"></div>
                <div class="input-group"><label for="pass2">Confirmar</label><input type="password" id="pass2" name="pass2"></div>
                <div class="text-center"><input type="checkbox"><label for="">Acepto Terminos</label></div>
                <div class="text-center"><button type="submit" class="btn btn-default">Suscribite</button></div>
            </form>
        </div>
        </div>
    </div>
</div>  
@endsection