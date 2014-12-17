<!DOCTYPE html>
<html>
<head>

    <title>@yield('title', 'Matryoshka International')</title>

    <meta charset='utf-8'>
        <!-- Bootstrap -->
    <link rel='stylesheet' href='{{ asset('css/bootstrap.min.css') }}'>
    <link rel='stylesheet' href='{{ asset('css/custom.css') }}'>

    @yield('head')

</head>
<body>

	@if(Session::get('flash_message'))
    <div class='flash-message alert alert-info'>{{ Session::get('flash_message') }}</div>
    @endif

 <div id="wrap">   
  <div id="main" class="container clear-top">

	<div class="container">

	@yield('navbar')

    <!-- row 1 -->
    <header class="row">
      <div class="col-lg-7 col-md-8 col-sm-7">
        <h1>Matryoshka International</h1>

		@if(Auth::check())
		    <a href='/logout'>Log out {{ Auth::user()->email; }}</a>
		@else 
		    <a href='/signup'>Sign up</a> or <a href='/login'>Log in</a>
		@endif

        <ul class="header-description">
          <li><h3>Learn foreign languages with peers around the world.</h3></li>
          <li><h3>Attend international events and make new friends along the way.</h3></li>
        </ul>
      </div>
      <div class="col-lg-5 col-md-4 col-sm-4 col-xs-5">
        <p><a href="#"><img src="/img/matryoshka_int_horiz.png" alt="" class="img-responsive" id="matryoshka-logo-horiz"></a></p>
      </div>
    </header>

    @yield('content')

    </div> <!-- closing main tag-->
  </div> <!--closing wrap tag-->

    <footer class="row" id ="footer">
      <p><small>Copyright by Matryoshka Int. All rights reserved.</small></p>
    </footer>


</div> <!--closing the container tag-->

    <!-- javascript -->
  <script src="http://code.jquery.com/jquery-latest.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/respond.js"></script>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script src="js/search.js"></script>


</body>
</html>