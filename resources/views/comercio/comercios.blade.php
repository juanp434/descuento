@extends('layouts.app')

@section('title')
    <title> Comercios </title>
@endsection

@section('content')

<div class="content">
       <div class="title"><label>Comercios Adheridos</label></div>
        
        <table class="table">
        @foreach ($comercios as $comercio)
            <tr class="item">
                <td>
                    <div class="promo"><img src="{{$comercio->image}}" height="100" align="center"></div>
	                <div class="promo">Nombre: {{$comercio->name}}</div>
                    <div class="promo">Email: {{$comercio->email}}</div>
                </a>
                </td>
            </tr>
        @endforeach
        </table>
</div>
@endsection