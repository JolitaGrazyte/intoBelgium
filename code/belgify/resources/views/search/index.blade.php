@extends('layouts.master')

@section('title', $title)

@section('content')

    <div class="search-wrapper">

        @include('partials.page-head')

        <div class="container">

            {{--@include('partials.page-head')--}}

            <h3 class="dont-answer">Didn't find your answer? Login or sign up to start a new conversation</h3>

            <div class="row">
                <div class="col-md-6">

                    <h2>Questions</h2>

                    <hr/>

                    @each('search.search_posts', $questions, 'result', 'search.no-results')

                </div>
                <div class="col-md-6">
                    <h2>Events</h2>

                    <hr/>

                    @each('search.search_events', $tours, 'result', 'search.no-results')
                </div>


            </div>

        </div>

    </div>

@stop