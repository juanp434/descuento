@extends('layouts.app')

@section('title')
    <title> Descuentos </title>
@endsection

@section('content')
<div class="content ">
        <h1>Ultimas promociones Adheridas</h1>
        
        <div class="wrap1">
        @foreach ($promotions as $promotion)
            <div class="" style="width: 49%; display: inline-block;">
                    <div class="item">
                        <a data-toggle="modal" data-target="#myModal{{$promotion->id}}">
                			<span></span>
                            <div class="promo">
        	                <img src='{{$promotion->image}}' style="width: 200px; height: 100px; padding-top: 5px;">
                    		</div>
                    		<div class="promo">Descripcion: {{$promotion->description}}</div>
                		</a>
                        @if ($promotion->days > 0)
                            <div class="promo">Quedan {{$promotion->days}} dias</div>
                        @else
                            <div class="promo">Finalizado</div>
                        @endif
                    </div>
               
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
                    <p>Ahorras: ${{$promotion->price - $promotion->final}} ({{(1-$promotion->final/$promotion->price)*100}}%)</p>
                </div>
                <div>
                  <p>Finaliza el: {{$promotion->expDate}}</p>
                </div>
              </div>
            </div>
          </div>
        </div>   

        @endforeach 
        </div>

</div>
@endsection