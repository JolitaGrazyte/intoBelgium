@extends('layouts.master')

@section('title', 'Events')

@section('content')


    <div class="event-d">
        <div class="container show-event">

            @include('events.single')

        </div>

    </div>

@stop

