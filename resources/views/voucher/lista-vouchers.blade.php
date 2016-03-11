@extends('layouts.app')

@section('title')
    <title> Denuncias </title>
@endsection

@section('content')
<div class="container">
    <div class="content">
        <h1 class="home">{{$head}}</h1>

        <table class="list-admin">
        	
            <th>Id</th>
        	<th>User Id</th>
        	<th>Promotion Id</th>
        	<th>Denunciado</th>
            <th>Acciones</th>
        	
            
            @foreach($vouchers as $voucher)
        	<tr>
        		<td>{{$voucher->id}} </td>
        		<td>{{$voucher->user_id}} </td>
        		<td>{{$voucher->promotion_id}} </td>
        		<td>{{$voucher->denunciado}} </td>
        		<td>
                    @if ($voucher->denunciado == 0)
        			<a href="/Denuncia-voucher/{{$voucher->id}}">Denunciar</a>
                    
                    @endif
        		</td>
        	</tr>
			@endforeach
        </table>
    </div>
</div>  
@endsection