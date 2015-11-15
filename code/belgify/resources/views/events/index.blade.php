@extends('layouts.master')

@section('title', $title)

@section('content')

    {{ session('eventDelete') }}

    <div class="events-wrapper">

        @include('partials.page-head')

        <div class="container">

            <div class="row">

                @include('partials.search')

                @if (Session::has('confirmDelete'))

                    <div class="alert alert-danger ">

                        <span>Are you sure you want to remove your event ? </span>

                        <a href="{{ route('event-delete', session('confirmDelete')) }}">Yes</a> || <a href="">Cancel</a>

                    </div>

                @endif

            @if(Auth::check() && $auth->isLocal())

               <h3 class="add"><a href="{{ url('/events/create .post-form') }}" data-url="{{ url('/events') }}" data-toggle="modal" data-target="#myModal">Add new event</a></h3>

            @endif


               @if(isset($events))

                   @each('dashboard.my_event', $events, 'event', 'events.partials.no-events')

               @endif

           </div>

        </div>
    </div>

@stop