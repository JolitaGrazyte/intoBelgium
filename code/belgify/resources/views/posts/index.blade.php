@extends('layouts.master')

@section('title', $title)

@section('content')

    <div class="container">

        @include('partials.message')

        @include('partials.errors')

        <h1>{{ $title }}</h1>

        @include('partials.search')

        <div>
            <a href="{{ route('posts.create') }}">Ask question</a>
        </div>

        <div class="row">

            @if(isset($posts))


                @each('posts.single', $posts, 'post', 'posts.no-posts')

            @endif

        </div>
    </div>

@stop