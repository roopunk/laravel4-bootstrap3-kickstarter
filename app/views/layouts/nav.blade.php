<div role="navigation" class="navbar navbar-default navbar-static-top">
      <div class="container">
        <div class="navbar-header">
          <button data-target=".navbar-collapse" data-toggle="collapse" class="navbar-toggle" type="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a href="#" class="navbar-brand">{{Config::get('project.project_name')}}</a>
        </div> <!-- .navbar-header -->

        <div class="navbar-collapse collapse">

          <ul class="nav navbar-nav">
            <li class="active"><a href="#">Home</a></li>
            <li><a href="#about">About</a></li>
            <li><a href="#contact">Contact</a></li>
          </ul>
          
          <ul class="nav navbar-nav navbar-right">
            @if (Auth::check())
	            <li><a href="/auth/logout">Logout</a></li>
            @else
	            <li><a href="/auth/login">Login</a></li>
            @endif
          </ul>
          
        </div><!--/.nav-collapse -->

      </div>
    </div>