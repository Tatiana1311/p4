@extends('_master')

@section('title')
    Start Page
@stop

@section('head')
    <link rel='stylesheet' href='/css/hello-world.css' type='text/css'>
@stop

@section('content')

        <!--row 2 -->
    <div class="jumbotron">
      <p><a class="btn btn-primary btn-lg" href="/signup" role="button">Sign Up</a></p>
      <p><a class="btn btn-primary btn-lg" href="/login" role="button">Log In</a></p>
    </div>
@stop
