<!DOCTYPE html>
<html class="login-bg">
  <head>
    <title>Devbeans Laravel 4 with Bootstrap 3.0 Kick Starter</title>
    @include('layouts.head')	
    <!-- this page specific styles -->
	<link rel="stylesheet" href="{{asset('assets/css/compiled/signin.css')}}" type="text/css" media="screen" />
  </head>
  <body>
    	
        	@yield('body')
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="{{asset('assets/js/jquery.js')}}"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
  </body>
</html>