@extends('_master')

@section('title')
    User Profile
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
            <li><a href="/">Home</a></li>
            <li><a href="/meetup">All MeetUps</a></li>
            <li><a href="/meetup/create">Add a MeetUp</a></li>
            <li class="active"><a href="/profile">Your Profile</a></li>
            <li><a href="/logout">Log Out</a></li>
          </ul>
        </div>
      </nav>
    </div>
@stop

@section('content')

    <!--row 2 -->
    <ol class="breadcrumb">
      <li>Home</li>
      <li>All MeetUps</li>
      <li>Add a MeetUp</li>
      <li class="active">Your Profile</li>
    </ol>

	<h1>Hello There! </h1>   
@stop