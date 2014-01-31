<!DOCTYPE html>
<html class="login-bg">
  <head>
    <title>Devbeans Laravel 4 with Bootstrap 3.0 Kick Starter</title>
    @include('layouts.head')	
    <!-- this page specific styles -->
    
    @yield('extra_css')
    
    <!-- lato font -->
    <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,900,300italic,400italic,700italic,900italic' rel='stylesheet' type='text/css' />
    
  </head>
  <body>
    	@include('layouts.top-nav')
        
        @include('layouts.sidebar')
        
        <!-- main container -->
	    <div class="content">
        	@if ( Session::has('message-success') )
            	<div class="alert alert-success">
                 	<i class="icon-ok-sign"></i> {{Session::get('message-success')}}
                </div>
            @endif
            
            @if ( Session::has('message-error') )
            	<div class="alert alert-danger">
                 	<i class="icon-ok-sign"></i> {{Session::get('message-error')}}
                </div>
            @endif
            
	        @yield('body')
        </div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="{{asset('assets/js/jquery.js')}}"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/js/jquery-ui-1.10.2.custom.min.js')}}"></script>
    <script src="{{asset('assets/js/theme.js')}}"></script>
    <script src="{{asset('assets/alertify/alertify.min.js')}}"></script>
    @yield('extra_js')
  </body>
</html>