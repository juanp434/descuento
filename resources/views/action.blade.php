@extends('layouts.app')

@section('title')
    <title> {{$message}} </title>
@endsection

@section('content')
    <div class="content">
        <h1 class="text-center">{{$message}}</h1>
        
    </div>
@endsection