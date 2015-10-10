@extends('layouts.master')

@section('title', $title)

@section('content')

    <h1>{{ $title }}</h1>

    <div><a href="{{ route('events.create') }}">Add new event</a></div>

@stop