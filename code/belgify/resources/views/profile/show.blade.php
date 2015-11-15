@extends('layouts.master')

@section('title', $title)

@section('content')

    <div class="container-fluid profile">

    <div class="container profile-container">
        <div class="row">

            <div class="col-md-12  profile-single">

                @include('partials.errors')

                @include('partials.message')

                @if(count($avatar))

                    <img class="events-profile-img"

                    <img src="{{ route('getImage', [$avatar->filename,  'small'] ) }}" class="dashboard-profile-img" alt="{{ $avatar->name }}">

                @else

                    <img class="dashboard-profile-img" src="{{ url('/img/Profile_Dummy1.png') }}"   alt="profile dummy">

                @endif





                <div class="body">


                    <h1 class="title"> {{ $user->first_name }} {{ $user->last_name }} </h1>

                    <hr/>

                    <div class="header">

                        @if($auth->id == $user->id)

                            <div class="edit-profile"> <a href="{{ route('profile.edit', str_replace(' ', '-', $auth->username) ) }}">Edit your profile</a> </div>

                        @endif

                    </div>

                    <p><b>Username</b></p>
                    <p class=""> {{ $user->username }} </p>

                    <p><b>Email</b></p>
                    <p class=""> {{ $user->email }} </p>

                    <div class="">
                        @if($user->occupation != '')
                            <p><b>Occupation</b></p>
                            <p>{{  $user->occupation }}</p>
                        @endif

                    </div>

                    <div class="">
                        @if($user->location != '')
                            <p><b>Residence</b></p>
                            <p>{{  $user->location->name }}</p>
                        @endif

                    </div>

                    <div>
                        @if(isset($user->story))
                            <p><b>Story</b></p>
                            <?=  $user->story ?>
                        @endif
                    </div>

                    @if($auth->id != $user->id)
                        <div>
                            {!!Form::open(['route' => ['follow', $user->id], 'class' => 'form-horizontal', 'role' => 'form'])  !!}

                            <div class="form-group">

                                {!! Form::submit( $isFollowed ?'Following':'Follow', ['class' =>  $isFollowed ? 'btn btn-primary btn-following' :'btn btn-primary btn-follow']) !!}

                            </div>

                            {!!Form::close() !!}

                        </div>

                    @endif

                    <hr/>
                </div>

            </div>
        </div>

        <div class="row">

            <div class="row">
                <div class="col-md-6">

                    <h2>Questions from {{ $user->username }}</h2>

                    <hr/>

                    @each('search.search_posts', $user->posts()->get(), 'result', 'search.no-results')

                </div>
                <div class="col-md-6">
                    <h2>Events from {{ $user->username }}</h2>

                    <hr/>

                    @each('search.search_events', $user->events()->get(), 'result', 'search.no-results')
                </div>


            </div>
        </div>

    </div>
    </div>

@stop