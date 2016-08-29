@extends('layouts.app')

@section('title')
    <title> Liquidaciones </title>
@endsection

@section('content')
<div class="content">
    <div class="content text-center">
        <h1 class="home">Generar Liquidacion</h1>
	<div class="wrap comercio">
		<label>Seleccione Promocion a liquidar</label> 
			<form action="generar-liquidacion" method="POST" >
			{!! csrf_field() !!}
				<div style="margin: 15px 0px;">
					<select name="select" required>
						@foreach($promotions as $promotion)
							<option value="{{$promotion->id}}">{{$promotion->name}}</option>
						@endforeach
					</select>
				</div>
				<div>
		        	<button type="submit" class="btn btn-default">Generar liquidacion</button>
		        </div>			
	        </form>
        </div>
    </div>
</div>  
@endsection