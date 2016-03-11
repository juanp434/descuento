@extends('layouts.app')

@section('title')
    <title> Liquidaciones </title>
@endsection

@section('content')
<div class="container">
    <div class="content">
        <h1 class="home">Liquidacion</h1>

        <div><label>Liquidacion numero: </label>{{$liquidation->id}}</div>
        <div><label>Nombre Promocion: </label>{{$liquidation->promotion_id}}</div>
        <div><label>Estado de la liquidacion: </label>{{$liquidation->estado}}</div>
        <div><<label>Monto Liquidado: $</label>{{$liquidation->Monto}}</div>

        <button href="/cambiar-estado-liquidacion/{{$liquidation->id}}">Aceptar liquidacion</button>
    </div>
</div>  
@endsection