@extends('layouts.master')

@section('title', 'Events')

@section('content')



    {{--<div class="post-d">--}}
    <div class="event-d">

        <div class="container show-event">

            @include('events.partials.single')

        </div>

    </div>

@stop

