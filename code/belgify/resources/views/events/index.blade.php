@extends('layouts.master')

@section('title', $title)

@section('content')

    {{--{{ session('eventDelete') }}--}}

    <div class="events-wrapper">

        @include('partials.page-head')

        <div class="container">

            <div class="row">

            @if (Session::has('confirmDelete'))

               <div class="">

                   <a href="{{ action('EventsController@destroy', Session::get('eventDelete')) }}">Yes</a> || <a href="{{ route('events.index') }}">Cancel</a>

               </div>

            @endif

                @include('partials.search')

            @if(Auth::check() && $auth->isLocal())

               <h3 class="add"><a href="{{ route('events.create') }}">Add new event</a></h3>

            @endif


               @if(count($events))

                   @each('partials.dashboard.my_event', $events, 'event', 'events.no-events')

               @endif

           </div>

        </div>
    </div>





@stop