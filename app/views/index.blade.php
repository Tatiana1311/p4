@extends('_master')

@section('title')
    Start Page
@stop

@section('head')
    <link rel='stylesheet' href='/css/hello-world.css' type='text/css'>
@stop

@section('navbar')
    <!--row 0:navigation-->
    <div class="row">
      <nav class="navbar navbar-default" role="navigation">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>
        <div class="collapse navbar-collapse" id="collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="/">Home</a></li>
            <li><a href="/meetup">All MeetUps</a></li>
            <li><a href="/meetup/create">Add a MeetUp</a></li>
            <li><a href="/profile">Your Profile</a></li>
            <li><a href="/contactus">Contact Us</a></li>
            <li><a href="/logout">Log Out</a></li>
          </ul>
        </div>
      </nav>
    </div>
@stop

@section('content')

    <!--row 2 -->
    <ol class="breadcrumb">
      <li class="active">Home</li>
    </ol>

  <div class="jumbotron">


<h1>Find MeetUps you for your language!</h1>

<p>
	{{ Form::open(array('url' => '/meetup', 'method' => 'GET')) }}

		{{ Form::label('query','Search') }}

		{{ Form::text('query'); }}

		{{ Form::submit('Search'); }}

	{{ Form::close() }}
</p>


	<!--<label for='query'>By the language  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>

	<input type='text' id='query' name='query' value='Russian'><br><br>

	{{ Form::token() }}


	<button id='search'>Search</button>

	<div id='results'></div>-->


   <!-- <div class="input-group">
      <span class="input-group-addon">By the city  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
      <input type="text" class="form-control" placeholder="Cambridge">
    </div>
  </br>
    <p><a class="btn btn-primary btn-lg" href="#" role="button">Search</a></p>
-->
  </div> 

@stop