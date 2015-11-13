@extends('layouts.master')

@section('content')


    <div class="row auth-form">
        <h1>Register</h1>
        <hr/>

        <div class="form-group">
            <a href="{{ url('login/facebook') }}"><button class="btn btn-primary fg-login f-login">Register with Facebook</button></a>
            <a href="{{ url('login/google') }}"><button class="btn btn-primary fg-login g-login">Register with Google</button></a>
        </div>

        <hr/>
        <h3 class="or">or</h3>

        {!! Form::open(['route' => 'getRegister', 'class' => 'form-horizontal', 'id' => 'Form', 'role' => 'form']) !!}

        <div class="form-group">
            <div id="role-group">
                <p class="help-text"></p>
                {!! Form::select('role', [1 => 'local', 2 => 'newcomer'], null,  ['class' => 'form-control', 'placeholder' => 'please select your status']) !!}
            </div>
        </div>

        <div class="form-group">
            <div id="username-group">
                <p class="help-text"></p>
                {!! Form::text('username', old('username'), ['class' => 'form-control',  'placeholder' => 'username']) !!}
            </div>
        </div>

        <div class="form-group">
            <div id="email-group">
                <p class="help-text"></p>
                {!! Form::email('email', old('email'), ['class' => 'form-control', 'placeholder' => 'email']) !!}
            </div>
        </div>

        <div class="form-group">
            <div id="password-group">
                <p class="help-text"></p>
                {!! Form::password('password', ['class' => 'form-control',  'placeholder' => 'password']) !!}
            </div>
        </div>

        <p class="help-text"></p>
        <input type="password" class="form-control" name="password_confirmation"  placeholder="confirm password">

        <button type="submit" class="btn btn-primary btn-login">
            Register
        </button>

        {!! Form::close() !!}

</div>
@stop