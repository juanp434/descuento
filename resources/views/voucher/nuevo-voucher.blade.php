@extends('layouts.app')

@section('title')
    <title> Denuncias </title>
@endsection

@section('content')
<div class="content">
        <h1 class="home">Alta Voucher</h1>
        <div class="wrap comercio">
            <form class="form-horizontal" method="POST" action="alta-voucher">
            {!! csrf_field() !!}
            <div class="promo">
                <label class="col-md-4">Usuario</label>
                <select name="user" required>
                    @foreach($users as $user)
                        @if ($user->admin == 0)
                            <option value="{{$user->id}}">{{$user->name}}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="promo">
                <label class="col-md-4">Promocion</label>
                <select name="promotion" required>
                    @foreach( $promotions as $promotion) 
                    <option value="{{$promotion->id}}">{{$promotion->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="promo">
            <button type="submit" class="btn btn-default"> Agregar</button>
            </div>
            </form>
        </div>
        
</div>
@endsection