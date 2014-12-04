@extends('_master')

@section('title')
    Hello World
@stop

@section('head')
    <link rel='stylesheet' href='/css/hello-world.css' type='text/css'>
@stop

@section('content')
	<h1>Hello {{$name}} </h1>   
@stop

@section('footer')
    <script src="/js/hello-world.js"></script>
@stop