@extends('_master')

@section('title')
    All MeetUps
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
            <li class="active"><a href="/meetup">All MeetUps</a></li>
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
      <li class="active">All MeetUps</li>
    </ol>

<div class="jumbotron">
	<h1>All MeetUps</h1>
</div>
	   <div class="col-lg-5 col-md-4 col-sm-4 col-xs-5" id="matr_vert">
        <p><a href="#"><img src="/img/matryoshka_int_vert.png" alt="" class="img-responsive" id="matryoshka-logo-vert"></a></p>
      </div>
  <div class="meetups">
	@if($query)
		<h2>You searched for {{{ $query }}}</h2>
	@endif

	@if(sizeof($meetups) == 0)
		No results
	@else
		@foreach($meetups as $meetup)
			<section class='meetup'>

				<h2>{{ $meetup['name'] }}</h2>

				<!--<p>
					<a href='/meetup/edit/{{$meetup['id']}}'>Edit</a>
				</p> -->

				<p>
					{{ $meetup['language']['name'] }} ({{ $meetup['date'] }}) ({{ $meetup['location'] }})
				</p>

				<a href='{{ $meetup['city_link'] }}'>Check out the city!</a> --> <br>

        <a href='/meetup/edit/{{$meetup['id']}}'>See something wrong? Edit the meetup!</a>
			</section>
		@endforeach
	@endif
</div>

@stop