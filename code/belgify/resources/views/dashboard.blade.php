@extends('layouts.master')

@section('title', $title)

@section('content')


        <div class="row dashboard">

            <div class="col-md-3 side-nav">

                @include('partials.side-nav')

            </div>

            <div class="col-md-9">

               @include('partials.page-head')

                <div class="container">
                    @include('partials.search')

                    @if(Request::is('dashboard/my-events') )

                        <div>

                            <h1>My tours</h1>

                            @each('partials.dashboard.my_event', $my_events, 'event', 'events.no-events')

                        </div>

                    @elseif(Request::is('dashboard/my-questions') )

                        <div>

                            <h1>My questions</h1>

                            @each('partials.dashboard.my_question', $my_questions, 'question', 'partials.no-events')


                        </div>

                    @elseif(Request::is('dashboard') )

                        <div>
                    <div>
                        @if(count($i_follow))

                            <h2>I'm following</h2>

                            @each('partials.dashboard.following', $i_follow, 'followed', 'partials.no-events')

                        @endif

                            @include('partials.dashboard.following')

                        </div>

                    @endif
                </div>
            </div>


        </div>

@stop
