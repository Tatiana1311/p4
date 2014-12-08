@extends('_master')

@section('title')
    Search Test
@stop

@section('head')
    
@stop

@section('content')

<div class="jumbotron">
	<h1>Search</h1>

<!--Eager load the languages with the events-->

$meetups = Meetup::with('language')->get();  

{{ foreach($meetups as $meetup) {
     echo $meetup->language->name.' is spoken at '.$meetup->name.'<br>';
} }}
</div>

@stop