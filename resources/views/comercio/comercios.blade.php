@extends('layouts.app')

@section('title')
    <title> Comercios </title>
@endsection

@section('content')

<div class="content">
       <h1>Comercios Adheridos</h1>
        @foreach ($comercios as $comercio)
            <div class="col-md-6">
                @if($comercio->id % 2 != 0)<div class="col-md-6"></div> @endif
                    <div class="item col-md-6">
                        <div class="promo"><img src="{{$comercio->image}}" height="100" align="center"></div>
    	                <div class="promo">Nombre: {{$comercio->name}}</div>
                        <div class="promo">Email: {{$comercio->email}}</div>
                    </a>
                    </div>
                @if($comercio->id % 2 == 0)<div class="col-md-6"></div> @endif
            </div>
        @endforeach
        
</div>
@endsection