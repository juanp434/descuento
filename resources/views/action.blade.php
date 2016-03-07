@extends('layouts.app')

@section('title')
    <title> {{$message}} </title>
@endsection

@section('content')
<div class="container">
    <div class="content">
        <h1 class="home">{{$message}}</h1>
        
    </div>
</div>  
@endsection