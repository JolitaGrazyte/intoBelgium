<h1>Login</h1>


<hr/>

<div class="form-group">
    <a href="{{ url('login/facebook') }}"><button class="btn btn-primary fg-login f-login">Login with Facebook</button></a>
    <a href="{{ url('login/google') }}"><button class="btn btn-primary fg-login g-login">Login with Google</button></a>
</div>

<hr/>
<h3 class="or">or</h3>

<div class="error-message">
    <p>these credentials do not match our records</p>
</div>

{!!Form::open(['route' => 'postLogin', 'class' => 'form-horizontal', 'id' => 'loginForm', 'role' => 'form'])  !!}

<div class="form-group">
    <div id="email-group">
        <p class="help-text"></p>
        {!! Form::email('email', old('email'), ['class' => 'form-control h-input', 'placeholder' => 'email']) !!}
    </div>
</div>

<div class="form-group">
    <div id="password-group">
        <p class="help-text"></p>
        {!! Form::password('password', ['class' => 'form-control h-input',  'placeholder' => 'password']) !!}
    </div>
</div>

<div class="form-group forgot-wrapper">

    <input type="checkbox" name="remember"> Remember me
    <a class="btn btn-link" href="{{ url('/password/email') }}" >Forgot Your Password?</a>

</div>

{!! Form::submit('Login', ['class' => 'btn btn-primary btn-login']) !!}


{!! Form::close() !!}

<script src="/js/app.js"></script>



