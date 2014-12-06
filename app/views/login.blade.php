@extends('_master')

@section('title')
    Sign Up
@stop

@section('head')
    
@stop

@section('content')

<div class="jumbotron">
	<h1>Log In</h1>
{{ Form::open(array('url' => '/login')) }}

    Email<br>
    {{ Form::text('email') }}<br><br>

    Password:<br>
    {{ Form::password('password') }}<br><br>

    {{ Form::submit('Submit') }}

{{ Form::close() }}
</div>

@stop