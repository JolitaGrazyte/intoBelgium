@extends('layouts.master')

@section('title', $title)

@section('content')

    <h1>{{ $title }}</h1>

    <div><a href="{{ route('posts.create') }}">Ask a question</a></div>

    @if(count($posts))

        @foreach($posts as $post)

            <div> {{ $post }} </div>

        @endforeach

    @endif


@stop