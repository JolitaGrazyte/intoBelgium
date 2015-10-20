@extends('layouts.master')

@section('title', $title)

@section('content')

    <h1>{{ $title }}</h1>

    @include('errors.errors')
    @include('layouts.message')

    <div class="container-fluid">

        <div class="row">

            <div class="col-md-8">

                <div class="panel panel-default">

                    <div class="panel-heading">

                        Your profile

                        <span class="navbar-right">
                            <a href="{{ route('profile.edit', Auth::user()->id) }}">
                                Edit your profile
                            </a>
                        </span>
                    </div>

                    <div class="panel-body">

                        <div class="col-md-10">
                            <div class="col-md-8">

                                {{ $user->first_name }}

                            </div>

                            <div class="col-md-8">

                                {{ $user->last_name }}

                            </div>

                            <div class="col-md-8">

                                {{ $user->username }}

                            </div>

                            <div class="col-md-8">

                                {{ $user->email }}

                            </div>

                            <div class="col-md-8">

                                {{ isset($user->occupation)?$user->occupation:null  }}

                            </div>

                            <div class="col-md-8">

                                {{ isset($location->name)?$location->name:null }}

                            </div>
                        </div>
                        <div class="col-md-2">

                        @if($avatar)

                                <img src="{{ route('getImage', [$avatar->filename]) }}" alt="{{ $avatar->name }}">

                        @endif

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop