@extends('layouts.app')

@section('title')
    <title> Promociones </title>
@endsection

@section('content')

<div class="content">
      <h1>Promociones</h1>
        
       
        @foreach ($promotions as $promotion)
            
            <div class="col-md-6">
                @if($promotion->id % 2 != 0)<div class="col-md-6"></div> @endif
                  <div class="item col-md-6">
                  <a data-toggle="modal" data-target="#myModal{{$promotion->id}}">
  	                <div class="promo"><img src='{{$promotion->image}}' style="width: 200px; height: 100px;"></div>
  	                <div class="promo">Descripcion: {{$promotion->description}}</div>
                  </a>
                  </div>
                @if($promotion->id % 2 == 0)<div class="col-md-6"></div> @endif
            </div>
             <!-- Modal -->
        <div id="myModal{{$promotion->id}}" class="modal fade" role="dialog">
          <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Detalle Descuento</h4>
              </div>
              <div class="modal-body">
                <div class="text-center"><img src="{{$promotion->image}}" style="max-height: 100px;"></div>
                <div>Nombre: {{$promotion->name}}</div>
                <div>Descripcion: {{$promotion->description}}</div>
                <div>
                    <p style="text-decoration: line-through;">Precio lista: ${{$promotion->price}}</p>
                    <p>Precio: ${{$promotion->final}}</p>
                    <p>Ahorras: ${{$promotion->price - $promotion->final}}</p>
                </div>
              </div>
            </div>
          </div>
        </div>   
        @endforeach
        <div class="text-center">
          {!! $promotions->render() !!}
        </div>

</div>
@endsection