@extends('layouts.master')

@section('title', $title)

@section('content')

    <h1>{{ $title }}</h1>

    @include('partials.errors')
    @include('partials.message')

    <div class="container-fluid">

        <div class="row">

            <div class="col-md-8">

                <div class="panel panel-default">

                    <div class="panel-heading">

                        Your profile

                        <span class="navbar-right">
                            <a href="{{ route('profile.edit', Auth::user()->username) }}">
                                Edit your profile
                            </a>
                        </span>
                    </div>

                    <div class="panel-body">

                        <div class="col-md-8">
                            <div class="">

                                {{ $user->first_name }}

                            </div>

                            <div class="">

                                {{ $user->last_name }}

                            </div>

                            <div class="">

                                {{ $user->username }}

                            </div>

                            <div class="">

                                {{ $user->email }}

                            </div>

                            <div class="">

                                {{ isset($user->occupation)?$user->occupation:null  }}

                            </div>

                            <div class="">

                                {{ isset($location->name)?$location->name:null }}

                            </div>
                        </div>
                        <div class="col-md-2">

                        @if($avatar)

                                <img src="{{ route('getImage', [$avatar->filename,  'small'] ) }}" alt="{{ $avatar->name }}">

                        @endif

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop