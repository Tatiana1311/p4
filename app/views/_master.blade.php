<!DOCTYPE html>
<html>
<head>

    <title>@yield('title', 'Matryoshka International')</title>

    <meta charset='utf-8'>
    <link rel='stylesheet' href='{{ asset('css/foobar.css') }}'>
        <!-- Bootstrap -->
    <link rel='stylesheet' href='{{ asset('css/bootstrap.min.css') }}'>
    <link rel='stylesheet' href='{{ asset('css/custom.css') }}'>

    @yield('head')

</head>
<body>

	<div class="container">

    <!-- row 1 -->
    <header class="row">
      <div class="col-lg-7 col-md-8 col-sm-7">
        <h1>Matryoshka International</h1>
        <ul class="header-description">
          <li><h3>Learn foreign languages with peers around the world.</h3></li>
          <li><h3>Attend international events and make new friends along the way.</h3></li>
        </ul>
      </div>
      <div class="col-lg-5 col-md-4 col-sm-4 col-xs-5">
        <p><a href="#"><img src="img/matryoshka_int_horiz.png" alt="" class="img-responsive" id="matryoshka-logo-horiz"></a></p>
      </div>
    </header>

    @yield('content')

    <footer class="row">
      <p><small>Copyright by Matryoshka Int. All rights reserved.</small></p>
    </footer>


</div> <!--closing the container tag-->

    <script src='https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js' type='text/javascript'></script>
    <!-- javascript -->
  <script src="http://code.jquery.com/jquery-latest.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/app.js"></script>
  <script src="js/respond.js"></script>

    <!--@yield('footer')-->

</body>
</html>