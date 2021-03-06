@extends('layouts.app')

@section('title')
    <title> Alta Comercios </title>
@endsection

@section('content')
<div class="content">
        <h1 class="home">Comercios</h1>

        <table class="list-admin">
            <th>Id</th>
            <th>Name</th>
            <th>Email</th>
            <th>Status</th>
            <th>Acciones</th>
        	@foreach($shops as $shop)
        	<tr>
        		<td>{{$shop->id}}</td>
        		<td>{{$shop->name}}</td>
        		<td>{{$shop->email}}</td>
        		<td>@if($shop->status == 0) Pendiente @else Activo @endif</td>
        		<td>
                @if ($shop->status == 0) 
                <a href="Aprovar-comercios/{{$shop->id}}">Aprobar</a>
                @endif
                <a href="{{ url('Eliminar-comercios/').'/'.$shop->id }}" onclick="return confirm('Desea eliminar el comercio?');">Eliminar</a>
                </td>
        	</tr>
			@endforeach
        </table>
        <div class="text-center"><a href="{{ url('alta-comercio') }}">Alta Comercio</a></div>
</div>  
@endsection