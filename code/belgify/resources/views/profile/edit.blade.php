@extends('layouts.master')

@section('title', $title)

@section('content')

    <h1>{{ $title }}</h1>

    <div class="container-fluid">

        <div class="row">

            <div class="col-md-10">

                <div class="panel panel-default">

                    <div class="panel-heading">

                        {{ $title }}

                    </div>

                    <div class="panel-body">

                        @include('errors.errors')

                        {!!Form::open(['route' => ['profile.update', $id], 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'PATCH'])  !!}

                        <div class="form-group">

                            {!! Form::label('first_name', 'First Name', ['class' => 'col-md-2 control-label']) !!}

                            <div class="col-md-10">

                                {!! Form::text('first_name', $user->first_name, ['class' => 'form-control', 'placeholder' => 'first name']) !!}

                            </div>
                        </div>

                        <div class="form-group">

                            {!! Form::label('last_name', 'Last Name', ['class' => 'col-md-2 control-label']) !!}

                            <div class="col-md-10">

                                {!! Form::text('last_name',  $user->last_name, ['class' => 'form-control', 'placeholder' => 'last name']) !!}

                            </div>
                        </div>

                        <div class="form-group">

                            {!! Form::label('username', 'Username', ['class' => 'col-md-2 control-label']) !!}

                            <div class="col-md-10">

                                {!! Form::text('username', $user->username, ['class' => 'form-control', 'placeholder' => 'username']) !!}

                            </div>
                        </div>

                        <div class="form-group">

                            {!! Form::label('email', 'E-mail', ['class' => 'col-md-2 control-label']) !!}

                            <div class="col-md-10">

                                {!! Form::email('email', $user->email, ['class' => 'form-control', 'placeholder' => 'email']) !!}

                            </div>
                        </div>

                        <div class="form-group">

                            {!! Form::label('birth_date', 'Birth date', ['class' => 'col-md-2 control-label']) !!}

                            <div class="col-md-10">

                                {!! Form::date('birth_date', $user->birth_date, ['class' => 'form-control', 'placeholder' => 'YYYY-mm-dd']) !!}

                            </div>

                        </div>

                        <div class="form-group">

                            {!! Form::label('occupation', 'Occupation', ['class' => 'col-md-2 control-label']) !!}

                            <div class="col-md-10">

                                {!! Form::text('occupation', $user->occupation, ['class' => 'form-control', 'placeholder' => 'occupation']) !!}

                            </div>
                        </div>

                        <div class="form-group">

                            {!! Form::label('origin', 'Origin', ['class' => 'col-md-2 control-label']) !!}

                            <div class="col-md-10">

                                {!! Form::text('origin', $user->origin, ['class' => 'form-control', 'placeholder' => 'origin']) !!}

                            </div>
                        </div>

                        <div class="form-group">

                            {!! Form::label('loaction', 'Location', ['class' => 'col-md-2 control-label']) !!}

                            <div class="col-md-10">

                                {!! Form::select('location', $locations, null, ['class' => 'form-control', 'placeholder' => 'choose your location']) !!}

                            </div>
                        </div>


                        <div class="form-group">

                        {!! Form::label('story', 'My story', ['class' => 'col-md-2 control-label']) !!}

                        <div class="col-md-10">

                        {!! Form::textarea('story', null, ['class' => 'form-control',  'placeholder' => 'my story']) !!}

                        </div>

                        </div>


                        <div class="form-group">
                            <div class="col-md-10 col-md-offset-2">

                                {!! Form::submit('Submit', ['class' => 'btn btn-primary form-control']) !!}

                            </div>
                        </div>

                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>

@stop