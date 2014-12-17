@extends('_master')

@section('title')
    Add MeetUp
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
            <li class="active"><a href="/meetup/create">Add a MeetUp</a></li>
            <li><a href="/profile">Your Profile</a></li>
            <li><a href="/">Sign Out</a></li>
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
      <li class="active">Add a new MeetUp</li>
    </ol>
  <div class="jumbotron">

    {{ Form::open(array('url' => '/meetup/create')) }}


   <p> {{ Form::label('name','MeeUp Name&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;') }}
    {{ Form::text('name'); }} </p>

    <p> {{ Form::label('language_id', 'Language Spoken at the MeetUp') }}
    {{ Form::select('language_id', $languages); }} </p>

    <p> {{ Form::label('date','Date (MM/DD/YYYY)') }}
    {{ Form::text('date'); }} </p>

    <p> {{ Form::label('location','City&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;') }}
    {{ Form::text('location'); }} </p>

    <p> {{ Form::label('city_link','Wikipedia Link of the City') }}
    {{ Form::text('city_link'); }} </p>

    <p> {{ Form::submit('Add'); }} </p>

  {{ Form::close() }}
  </div>

@stop