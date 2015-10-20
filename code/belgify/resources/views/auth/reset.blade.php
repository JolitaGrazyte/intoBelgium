@extends('layouts.master')

@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Reset Password</div>
                    <div class="panel-body">

                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form class="form-horizontal" role="form" method="POST" action="/password/reset">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="token" value="{{ $token }}">

                            <div class="form-group">
                                <label class="col-md-4 control-label">E-Mail Address</label>
                                <div class="col-md-6">
                                    <input type="email" class="form-control" name="email" value="{{ old('email') }}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">Password</label>
                                <div class="col-md-6">
                                    <input type="password" class="form-control" name="password">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">Confirm Password</label>
                                <div class="col-md-6">
                                    <input type="password" class="form-control" name="password_confirmation">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Reset Password
                                    </button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection



{{--@extends('layouts.main')--}}


{{--@section('content')--}}

    {{--<div class="panel-body">--}}

        {{--<form id="reset-form" class="form-visitors" role="form" method="POST" action="/password/reset">--}}

            {{--<header>--}}
                {{--<h4>Reset form</h4>--}}

                {{--@include('errors.errors')--}}

                {{--@if ( session('status') )--}}
                    {{--<div class="alert alert-success">--}}
                        {{--{{ session('status') }}--}}
                    {{--</div>--}}

                {{--@endif--}}

            {{--</header>--}}

            {{--<input type="hidden" name="_token" value="{{ csrf_token() }}">--}}

            {{--<input type="hidden" name="token" value="{{ $token }}">--}}

            {{--<fieldset>--}}

                {{--<section>--}}

                    {{--<div class="row">--}}

                        {{--<label class="label col col-4">E-mail:</label>--}}

                        {{--<div class="col col-8">--}}

                            {{--<label class="input">--}}

                                {{--<i class="icon icon-user"></i>--}}

                                {{--<input type="email" name="email" value="{{ old('email') }}">--}}

                            {{--</label>--}}

                        {{--</div>--}}

                    {{--</div>--}}

                {{--</section>--}}

                {{--<section>--}}

                    {{--<div class="row">--}}

                        {{--<label class="label col col-4">Password:</label>--}}

                        {{--<div class="col col-8">--}}

                            {{--<label class="input">--}}

                                {{--<i class="icon icon-lock"></i>--}}

                                {{--<input type="password" name="password">--}}

                            {{--</label>--}}

                        {{--</div>--}}

                    {{--</div>--}}

                {{--</section>--}}

                {{--<section>--}}

                    {{--<div class="row">--}}

                        {{--<label class="label col col-4">Confirm Password:</label>--}}

                        {{--<div class="col col-8">--}}

                            {{--<label class="input">--}}

                                {{--<i class="icon icon-lock"></i>--}}

                                {{--<input type="password" name="password_confirmation">--}}

                            {{--</label>--}}

                        {{--</div>--}}

                    {{--</div>--}}

                {{--</section>--}}

            {{--</fieldset>--}}

            {{--<footer>--}}

                {{--<button type="submit" class="button">--}}
                    {{--Reset Password--}}
                {{--</button>--}}

            {{--</footer>--}}

        {{--</form>--}}

    {{--</div>--}}

    {{--</div>--}}

{{--@endsection--}}
