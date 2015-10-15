@extends('layouts.master')

@section('title', $title)

@section('content')

    <h1>{{ $title }}</h1>

    <div><a href="{{ route('events.create') }}">Add new event</a></div>

    @if(count($events))

        @foreach($events as $event)

            <div> {{ $event }} <span><a href="{{ route('events.edit', $event->id) }}">update this event</a></span></div>

        @endforeach

    @endif


@stop