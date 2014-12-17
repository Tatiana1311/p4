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

    {{ Form::label('email') }}
    {{ Form::text('email', 't@gmail.com') }}

    {{ Form::label('password') }} (123456)
    {{ Form::password('password') }}

    {{ Form::submit('Submit') }}

{{ Form::close() }}
</div>

@stop