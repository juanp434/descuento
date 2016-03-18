@extends('layouts.app')

@section('title')
    <title> Admin </title>
@endsection

@section('content')
<div class="content">
    <h1>Admin</h1>
    <div class="col-md-4 col-md-offset-3">
        <label>Usuarios Registrados: {{$users}}</label>
    </div>
    <div class="col-md-4 col-md-offset-3">
        <label>Comercios Registrados: {{$shops}}</label>
    </div>
    <div class="col-md-4 col-md-offset-3">
        <label>Monto de descuentos pendientes de pago: $ {{$monto}}</label>
    </div>
</div>
@endsection