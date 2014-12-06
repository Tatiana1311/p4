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
            <li class="active"><a href="/home">Home</a></li>
            <li><a href="/allmeetups">All MeetUps</a></li>
            <li><a href="/addmeetup">Add a MeetUp</a></li>
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
    <h2>Search MeetUps</h2>
    <div class="input-group">
      <span class="input-group-addon">By the language</span>
      <input type="text" class="form-control" placeholder="Russian">
    </div>
    <br>

    <div class="input-group">
      <span class="input-group-addon">By the city  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
      <input type="text" class="form-control" placeholder="Cambridge">
    </div>
  </br>
    <p><a class="btn btn-primary btn-lg" href="#" role="button">Search</a></p>
  </div>

@stop