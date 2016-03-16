@extends('layouts.app')

@section('title')
    <title> Liquidaciones </title>
@endsection

@section('content')
<div class="content">
    <div class="content">
        <h1 class="home">Liquidaciones</h1>

        <table class="list-admin">
            <th>Id</th>
            <th>Promocion</th>
            <th>Estado</th>
            <th>Monto</th>
            <th>Acciones</th>
        	@foreach($liquidations as $liquidation)
        	<tr>
        		<td>{{$liquidation->id}}</td>
        		<td>{{$liquidation->promotion_id}}</td>
        		<td>{{$liquidation->estado}}</td>
        		<td>{{$liquidation->Monto}}</td>
        		<td>
                @if ($liquidation->estado == 'PENDIENTE')
                <a href="/liquidaciones/{{$liquidation->id}}">Verificar</a>
                @endif
                </td>
        	</tr>
			@endforeach
        </table>
        
    </div>
</div>  
@endsection