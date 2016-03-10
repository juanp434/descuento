@extends('layouts.app')

@section('title')
    <title> Denuncias </title>
@endsection

@section('content')
<div class="container">
    <div class="content">
        <h1 class="home">Vouchers</h1>

        <table class="list-admin">
        	
            <th>Id</th>
        	<th>User Id</th>
        	<th>Promotion Id</th>
        	<th>Denunciado</th>
        	<th>Acciones</th>
            
            @foreach($vouchers as $voucher)
        	<tr>
        		<td>{{$voucher->id}}</td>
        		<td>{{$voucher->user_id}}</td>
        		<td>{{$voucher->promotion}}</td>
        		<td>{{$voucher->denunciado}}</td>
        		<td>
        			<a href="/Eliminar-voucher/{{$voucher->id}}">Eliminar</a>
        		</td>
        	</tr>
			@endforeach
        </table>
        <div><a href="/nuevo-voucher">Agregar voucher</a></div>
    </div>
</div>  
@endsection