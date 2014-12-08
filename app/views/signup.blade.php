@extends('_master')

@section('title')
    Sign Up
@stop

@section('head')
    
@stop

@section('content')

<div class="jumbotron">
	<h1>Sign Up</h1>

@foreach($errors->all() as $message) 
    <div class='error'>{{ $message }}</div>
@endforeach
	
{{ Form::open(array('url' => '/signup')) }}

    Email<br>
    {{ Form::text('email') }}<br><br>

    Password:<br>
    {{ Form::password('password') }}<br><br>

    {{ Form::submit('Submit') }}

{{ Form::close() }}
</div>

@stop