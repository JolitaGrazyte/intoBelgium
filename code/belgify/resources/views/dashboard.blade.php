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

                            @if(Auth::check() && Auth::user()->isLocal())

                                <h3 class="add"><a href="{{ url('/events/create .post-form') }}" data-url="{{ url('/event') }}" data-toggle="modal" data-target="#myModal">Add new event</a></h3>

                            @endif

                            @if(isset($my_events))

                                <h2>My events</h2>

                                @each('dashboard.my_event', $my_events, 'event', 'events.partials.no-events')

                            @endif

                            @if(isset($events_attending))

                                <h2>Events i'm going to</h2>

                                @each('dashboard.my_event', $events_attending, 'event', 'events.partials.no-events')

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
                        @if(isset($followed))

                            <h1 id="titleFollowing">I'm following</h1>

                            <hr/>

                            <div class="row">

                                @if(count($followed))
                                    @foreach(array_chunk($followed, $followsplitter, true) as $column)
                                        <div class="col-md-4">
                                            @foreach($column as $follwd)
                                                    @include('dashboard.following', $follwd)
                                            @endforeach
                                        </div>
                                    @endforeach
                                @else
                                    @include('dashboard.no-content')
                                @endif
                            </div>


                        @endif

                        </div>

                    @endif
                </div>
            </div>
        </div>

        </div>

@stop
