@extends('layouts.master')

@section('title', $title)

@section('content')


        <div class="row dashboard">

            <div class="col-md-2">

                @include('partials.side-nav')

            </div>

            <div class="col-md-10">

               @include('partials.page-head')

                <div class="container">
                    @include('partials.search')

                    @if(Request::is('dashboard/my-events') )

                        <div class="content-wrapper">

                            <h1>Upcomming Events</h1>

                            @if(isset($my_events))

                                @if(Auth::check() && Auth::user()->isLocal())

                                    <h3 class="add"><a href="{{ route('events.create') }}">Add new event</a></h3>

                                @endif

                                @each('dashboard.my_event', $my_events, 'event', 'events.no-events')

                            @endif

                        </div>

                    @elseif(Request::is('dashboard/my-questions') )

                        <div class="content-wrapper">

                            <h1>My questions</h1>

                            <h3 class="add">
                                <a href="{{ url('/posts/create .post-form') }}" data-url="{{ url('/dashboard/my-questions') }}" data-toggle="modal" data-target="#myModal">Ask question</a>
                            </h3>

                            @each('dashboard.my_question', $my_questions, 'post', 'partials.no-entries')


                        </div>

                    @elseif(Request::is('dashboard') )

                        <div>
                    <div>
                        @if(count($i_follow))

                            <h2>I'm following</h2>

                            @each('dashboard.following', $i_follow, 'followed', 'partials.no-entries')

                        @endif

                        </div>

                    @endif
                </div>
            </div>


        </div>

@stop
