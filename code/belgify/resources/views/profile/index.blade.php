@extends('layouts.master')

@section('title', $title)

@section('content')

    <h1>{{ $title }}</h1>

    @include('partials.errors')

    @include('partials.message')


    <div class="row">

        <div class="col-md-2">

            @include('partials.side-nav')

        </div>

        <div class="col-md-7  profile-single">

            <div class="header">

                <div class=""> <a href="{{ route('profile.edit', str_replace(' ', '-', Auth::user()->username) ) }}">Edit your profile</a> </div>

            </div>


            <div class="body">

                @if($avatar)

                    <img src="{{ route('getImage', [$avatar->filename,  'small'] ) }}" width="250" alt="{{ $avatar->name }}">

                @endif

                <div class=""> {{ $user->first_name }} </div>

                <div class=""> {{ $user->last_name }} </div>

                <div class=""> {{ $user->username }} </div>

                <div class=""> {{ $user->email }} </div>

                <div class="">

                    {{ isset($user->occupation)?$user->occupation:null  }}

                </div>

                <div class="">

                    {{ isset($user->location)?$user->location->name.', '.$user->location->postcode :null }}

                </div>

            </div>

        </div>

    </div>

@stop