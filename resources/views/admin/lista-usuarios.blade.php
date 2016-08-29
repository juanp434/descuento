@extends('layouts.app')

@section('title')
    <title> Alta Usuarios </title>
@endsection

@section('content')
<div class="content">
        <h1 class="home">Usuarios</h1>

        <table class="list-admin">
        	<th>Id</th>
        	<th>Name</th>
        	<th>Last Name</th>
        	<th>Dni</th>
        	<th>Adress</th>
        	<th>CP</th>
        	<th>Email</th>
        	<th>Status</th>
        	<th>Acciones</th>
        	@foreach($users as $user)
        	<tr>
        		<td>{{$user->id}}</td>
        		<td>{{$user->name}}</td>
        		<td>{{$user->last}}</td>
        		<td>{{$user->dni}}</td>
        		<td>{{$user->adress}}</td>
        		<td>{{$user->cp}}</td>
        		<td>{{$user->email}}</td>
        		<td>@if($user->status == 0) Pendiente @else Activo @endif</td>
        		<td>
        		@if ($user->status == 0)
        			<a href="Aprovar-usuarios/{{$user->id}}">Aprobar</a>
        		@endif
        		@if ($user->admin == 0)
        			<a href="Eliminar-usuarios/{{$user->id}}" onclick="return confirm('Desea eliminar el usuario?');">Eliminar</a>
				@endif
        		</td>
        	</tr>
			@endforeach
        </table>
        
</div>  
@endsection