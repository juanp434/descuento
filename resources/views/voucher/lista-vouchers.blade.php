@extends('layouts.app')

@section('title')
    <title> Denuncias </title>
@endsection

@section('content')
    <div class="content">
        <h1 class="home">{{$head}}</h1>

        <table class="list-admin">
        	
            <th>Id</th>
        	<th>User Id</th>
        	<th>Promotion Id</th>
        	<th>Denunciado</th>
            <th>Descargo</th>
            <th>Acciones</th>
            @foreach($vouchers as $voucher)
        	<tr>
        		<td>{{$voucher->id}} </td>
        		<td>{{$voucher->user_id}} </td>
        		<td>{{$voucher->promotion_id}} </td>
        		<td>@if ($voucher->denunciado == 0)No @else Si @endif </td>
        		<td>@if ($voucher->descargo) {{$voucher->descargo}} @else No @endif</td>
                <td>
                    @if ($voucher->denunciado == 1 && Auth::user()->role == 'admin' && $voucher->descargo != '' && $head == 'Gastos Denunciados')
            			<a href="estimar-voucher/{{$voucher->id}}">Estimar descargo</a> <!--comercio tiene razon denunciado 2 descargo estimado-->
                        <a href="desestimar-voucher/{{$voucher->id}}">Desestimar descargo</a><!--usuario tiene razon denunciado 2 descargo desestimado-->
                    @endif
                    @if (Auth::user()->role == 'user' && $voucher->denunciado == 0)
                        <a href="Denuncia-voucher/{{$voucher->id}}">Denunciar</a>
                    @endif
        		</td>
        	</tr>
			@endforeach
        </table>
    </div>
@endsection