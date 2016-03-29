@extends('layouts.app')

@section('title')
    <title> {{$message}} </title>
@endsection

@section('content')
    <div class="content">
        <h1 class="text-center">{{$message}}</h1>
        <div class="text-center">
        	<label>Su solicitud sera confirmada dentro de las 24hs</label>
        </div>
		<div class="text-center">
			<a href="/">Volver</a>
		</div>

        
    </div>
@endsection