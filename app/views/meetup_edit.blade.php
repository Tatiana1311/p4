@extends('_master')

@section('title')
	Edit
@stop

@section('head')

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
            <li><a href="/profile">Your Profile</a></li>
            <li><a href="/logout">Log Out</a></li>
          </ul>
        </div>
      </nav>
    </div>
@stop

@section('content')

	  <ol class="breadcrumb">
      <li>Home</li>
      <li class="active">Edit {{{ $meetup['name'] }}}</li>
    </ol>

<div class="jumbotron">
	<h1>Edit a MeetUp</h1>
</div>
	<h2>{{{ $meetup['name'] }}}</h2>

	{{---- EDIT -----}}
	{{ Form::open(array('url' => '/meetup/edit')) }}

		{{ Form::hidden('id',$meetup['id']); }}

		<div class='form-group'>
			{{ Form::label('name','name') }}
			{{ Form::text('name',$meetup['name']); }}
		</div>

		<div class='form-group'>
			{{ Form::label('language_id', 'Language') }}
			{{ Form::select('language_id', $languages, $meetup->language_id); }}
		</div>

		<div class='form-group'>
			{{ Form::label('date','date Year (YYYY)') }}
			{{ Form::text('date',$meetup['date']); }}
		</div>

		<div class='form-group'>
			{{ Form::label('location','Location') }}
			{{ Form::text('location',$meetup['location']); }}
		</div>

		<div class='form-group'>
			{{ Form::label('city_link','city Link URL') }}
			{{ Form::text('city_link',$meetup['city_link']); }}
		</div>

		{{ Form::submit('Save'); }}

	{{ Form::close() }}
	<br>

	<div>
		{{---- DELETE -----}}
		{{ Form::open(array('url' => '/meetup/delete')) }}
			{{ Form::hidden('id',$meetup['id']); }}
			<button onClick='parentNode.submit();return false;'>Delete</button>
		{{ Form::close() }}
	</div>


@stop