@extends('layouts.master')

@section('title', $title)

@section('content')


        <div class="row">

            <div class="col-md-2">

                @include('partials.side-nav')

            </div>

            <div class="col-md-7">

               @include('partials.page-head')

                @if(Request::is('dashboard/my-events') )

                    <div>

                        <h1>My tours</h1>

                        @each('partials.dashboard.my_event', $my_events, 'event', 'events.no-events')

                    </div>

                @elseif(Request::is('dashboard/my-questions') )

                    <div>

                        <h2>My questions</h2>

                        @each('partials.dashboard.my_question', $my_questions, 'question', 'partials.no-events')


                    </div>

                @elseif(Request::is('dashboard') )

                    <div>

                        @include('partials.dashboard.following')

                    </div>

                @endif
            </div>

        </div>

@stop
