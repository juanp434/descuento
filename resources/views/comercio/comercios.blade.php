@extends('layouts.app')

@section('title')
    <title> Comercios </title>
@endsection

@section('content')

<div class="content">
       <div class="title"><label>Comercios Adheridos</label></div>
        
        <table class="table">
        @foreach ($promotions as $promotion)
            <tr class="item">
                <td>
                <a data-toggle="modal" data-target="#myModal{{$promotion->id}}">
	                <div class="promo"><img src='{{$promotion->image}}' style="width: 200px; height: 100px;"></div>
	                <div class="promo">Descripcion: {{$promotion->description}}</div>
                </a>
                </td>
            </tr>
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
                <div class="text-center"><a class="btn btn-default text-center" href="/comprar-voucher/{{$promotion->id}}">Comprar</a></div>
              </div>
            </div>
          </div>
        </div>   
        @endforeach
        </table>
        <div class="text-center">
          {!! $promotions->render() !!}
        </div>

</div>
@endsection