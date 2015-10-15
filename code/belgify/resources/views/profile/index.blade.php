@extends('layouts.master')

@section('title', $title)

@section('content')

    <h1>{{ $title }}</h1>

    @include('errors.errors')

    <div class="container-fluid">

        <div class="row">

            <div class="col-md-12">

                <div class="panel panel-default">

                    <div class="panel-heading">

                        Your profile

                        <span class="navbar-right">
                            <a href="{{ route('profile.edit', 1) }}">
                                Edit your profile
                            </a>
                        </span>
                    </div>

                    <div class="panel-body">

                        <div class="col-md-12">

                            {{ $user->first_name }}

                        </div>

                        <div class="col-md-12">

                            {{ $user->last_name }}

                        </div>

                        <div class="col-md-12">

                        {{ $user->username }}

                        </div>

                        <div class="col-md-12">

                            {{ $user->email }}

                        </div>

                        <div class="col-md-12">

                            {{ $user->occupation }}

                        </div>

                        <div class="col-md-12">

                            {{ $location->name }}

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@stop