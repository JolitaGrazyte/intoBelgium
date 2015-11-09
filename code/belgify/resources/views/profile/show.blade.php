@extends('layouts.master')

@section('title', $title)

@section('content')

    <h1>{{ $title }}</h1>

    <div class="row">

        <div class="col-md-2">

            @include('partials.side-nav')

        </div>

        <div class="col-md-7  profile-single">

            @include('partials.errors')

            @include('partials.message')


            <div class="header">

                @if($auth->id == $user->id)

                    <div class=""> <a href="{{ route('profile.edit', str_replace(' ', '-', $auth->username) ) }}">Edit your profile</a> </div>

                @endif

            </div>


            <div class="body">


                @if(count($avatar))

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

                <div>
                    {{ !empty($user->story) ? $user->story.', '.$user->story :null }}
                </div>

                    {!!Form::open(['route' => ['follow', $user->id], 'class' => 'form-horizontal', 'role' => 'form'])  !!}

                    <div class="form-group">


{{--                        {!! Form::hidden('follow', $isFollowed, ['class' => '', 'onchange' => 'this.form.submit())']) !!}--}}

                        {!! Form::submit( $isFollowed ?'Following':'Follow', ['class' =>  $isFollowed ? 'btn btn-primary' :'btn-follow btn btn-primary']) !!}

                    </div>

                    {!!Form::close() !!}

            </div>

        </div>

    </div>

@stop