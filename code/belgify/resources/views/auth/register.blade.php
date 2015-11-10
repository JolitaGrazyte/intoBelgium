

@include('partials.errors')

<h1>Register</h1>
<hr/>

<div class="form-group">
    <a href="{{ url('login/facebook') }}"><button class="btn btn-primary fg-login f-login">Register with Facebook</button></a>
    <a href="{{ url('login/google') }}"><button class="btn btn-primary fg-login g-login">Register with Google</button></a>
</div>

<hr/>
<h3 class="or">or</h3>

                        {!! Form::open(['route' => 'getRegister', 'class' => 'form-horizontal', 'role' => 'form']) !!}

                        <div class="form-group">
                            {!! Form::select('role', [1 => 'local', 2 => 'newcomer'], null,  ['class' => 'form-control', 'placeholder' => 'please select your status']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::text('username', old('username'), ['class' => 'form-control',  'placeholder' => 'username']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::email('email', old('email'), ['class' => 'form-control', 'placeholder' => 'email']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::password('password', ['class' => 'form-control',  'placeholder' => 'password']) !!}
                        </div>

<input type="password" class="form-control" name="password_confirmation"  placeholder="confirm password">

<button type="submit" class="btn btn-primary btn-login">
    Register
</button>

{!! Form::close() !!}


