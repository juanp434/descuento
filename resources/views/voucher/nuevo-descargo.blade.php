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
            <th>Acciones</th>
        	
            
            @foreach($vouchers as $voucher)
        	<tr>
        		<td>{{$voucher->id}} </td>
        		<td>{{$voucher->user_id}} </td>
        		<td>{{$voucher->promotion_id}} </td>
        		<td>@if ($voucher->denunciado == 0)No @else Si @endif </td>
        		<td>
                    @if ($voucher->denunciado == 1)
        			<a data-toggle="modal" data-target="#myModal{{$voucher->id}}">Realizar descargo</a>
                    
                    @endif
        		</td>
        	</tr>

            <!-- Modal -->
            <div id="myModal{{$voucher->id}}" class="modal fade" role="dialog">
              <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Realizar Descargo</h4>
                  </div>
                  <div class="modal-body">
                    
                    <form action="#" method="POST">
                        <div>
                            <input rows="4" cols="30" name="text" placeholder="Ingrese descargo">
                            </input>
                        </div>
                        <button type="submit">Aceptar</button>

                    </form>
                    

                  </div>
                </div>
              </div>
            </div>   

			@endforeach
        </table>
    </div>
@endsection