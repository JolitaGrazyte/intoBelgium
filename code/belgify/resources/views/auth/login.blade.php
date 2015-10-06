@extends('layouts.master')

@section('content')

    <div class="panel-heading">
    </div>

    <div class="panel-body">

        @include('layouts.errors')

        {!!Form::open(['route' => 'postLogin'])  !!}

        <form id="login-form" class="form-visitors" role="form" method="POST" action="{{ URL::asset('/auth/login') }}">
            <header>
                <h4>Login form</h4>


            </header>

            <input type="hidden" name="_token" value="{{ csrf_token() }}">

            <fieldset>
                <section>
                    <div class="row">

                        <label class="label col col-4">E-mail:</label>
                        <div class="col col-8">
                            <label class="input">
                                <i class="icon icon-user"></i>
                                <input type="email" name="email" value="{{ old('email') }}">
                            </label>
                        </div>
                    </div>

                </section>

                <section>
                    <div class="row">
                        <label class="label col col-4">Password:</label>
                        <div class="col col-8">
                            <label class="input">
                                <i class="icon icon-lock"></i>
                                <input type="password" name="password">
                            </label>
                            <a class="note" href="{{ URL::asset('/password/email') }}">Forgot Your Password?</a>
                        </div>
                    </div>
                </section>

                <section>
                    <div class="row">
                        <div class="col col-4"></div>
                        <div class="col col-8">
                            <label class="checkbox"><input type="checkbox" name="checkbox-inline" checked=""><i></i>Keep me logged in</label>
                        </div>
                    </div>
                </section>



            </fieldset>
            <footer>
                <button type="submit" class="button">
                    Login
                </button>

            </footer>

        </form>
    </div>

@stop
