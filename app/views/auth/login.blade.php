@section('body')
    <div class="login-wrapper">
        <a href="index.html">
            <img class="logo" src="{{asset('assets/img/logo-white.png')}}" alt="logo" />
        </a>

        <div class="box">
            <div class="content-wrap">
            	{{Form::open(array('role' => 'form', 'class' => 'form-signin'))}}
                    <h6>Log in</h6>
                     @if (isset($error))
                        <div class="alert alert-danger">
                            <i class="icon-remove-sign"></i>
                            Authentication Error. {{$error}}.
                        </div>
                    @endif
                    {{Form::text('username', '', array('placeholder' => 'Username', 'class' => 'form-control'))}}
                    {{Form::password('password', array('placeholder' => 'Password', 'class' => 'form-control'))}}
                    <a href="#" class="forgot">Forgot password?</a>
                    <div class="remember">
                        {{Form::checkbox('remember', '1')}} 
                        <label for="remember-me">Remember me</label>
                    </div>
                    
                    {{Form::button('Log In',array('class' => 'btn-glow primary login', 'type' => 'submit'))}}
                {{Form::close()}}
            </div>
            
        </div>

        <div class="no-account">
            <p>Don't have an account?</p>
            <a href="signup.html">Sign up</a>
        </div>
    </div>

@stop