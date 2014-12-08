@extends('_master')

@section('title')
    Sign Up
@stop

@section('head')
    
@stop

@section('content')

<section>

	<h2>{{ $meetup['name'] }}</h2>

	<p>
	{{ $meetup['language']->name }} {{ $meetup['date'] }} {{ $meetup['location'] }}
	</p>


	<a href='{{ $meetup['city_link'] }}'>Check out the location!</a>
	<br>
	<a href='/meetup/edit/{{ $meetup->id }}'>See something wrong? Edit the meetup!</a>
</section>

@stop