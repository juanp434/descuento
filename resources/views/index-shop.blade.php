@extends('layouts.app')

@section('title')
    <title> Comercio </title>
@endsection

@section('content')
<div class="content ">
        <h1>Comercios</h1>
            <div class="col-md-6 col-md-offset-1">
                <label>Cantidad de usuarios que hicieron gastos en la ultima semana: {{$users}}</label>
            </div> 
            <div class="col-md-6 col-md-offset-1">
                <label>Saldo pendiente de pago por parte de la universidad: $ {{$saldo}} pesos</label>
            </div>
            <div class="col-md-6 col-md-offset-1">
                <label>Top de productos más adquiridos:</label>
            </div>

            @foreach ($ranking as $rank)
            <div class="col-md-12 col-md-offset-4">
                <div>Rank {{$rank->id}}</div>
                <div class="item col-md-4">
                        <div class="promo">
                        <img src='{{$rank->image}}' style="width: 200px; height: 100px;">
                        </div>
                        <div class="promo">Descripcion: {{$rank->description}}</div>
                    </a>
                </div>
            </div>
            @endforeach
</div>
@endsection