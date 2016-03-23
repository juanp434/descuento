@extends('layouts.app')

@section('title')
    <title> Comercios </title>
@endsection

@section('content')

<div class="content">
       <h1>Comercios Adheridos</h1>
        <div class="wrap1">
        @foreach ($comercios as $comercio)
            <div class="" style="width: 49%; display: inline-block;">
                    <div class="item">
                        <div class="promo"><img src="{{$comercio->image}}" height="100" align="center"></div>
    	                <div class="promo">Nombre: {{$comercio->name}}</div>
                        <div class="promo">Email: {{$comercio->email}}</div>
                    </a>
                    </div>
            </div>
        @endforeach
        </div>
</div>
@endsection