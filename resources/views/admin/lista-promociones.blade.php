@extends('layouts.app')

@section('title')
    <title> Alta Promociones </title>
@endsection

@section('content')
    <div class="content">
        <h1 class="home">Promociones</h1>

        <table class="list-admin">
            <th>Id</th>
            <th>Name</th>
            <th>Description</th>
            <th>Price</th>
            <th>Final Price</th>
            <th>Shop Id</th>
            <th>Status</th>
            <th>Acciones</th>
        	@foreach($promotions as $promotion)
        	<tr>
        		<td>{{$promotion->id}}</td>
        		<td>{{$promotion->name}}</td>
                <td>{{$promotion->description}}</td>
                <td>{{$promotion->price}}</td>
                <td>{{$promotion->final}}</td>
                <td>{{$promotion->shop_id}}</td>
        		<td>{{$promotion->status}}</td>
        		<td>
                @if ($promotion->status == 0)
                <a href="/Aprovar-promociones/{{$promotion->id}}">Aprobar</a>
                @endif
                <a href="/Eliminar-promociones/{{$promotion->id}}">Eliminar</a>
                </td>
        	</tr>
			@endforeach
        </table>
        
</div>  
@endsection