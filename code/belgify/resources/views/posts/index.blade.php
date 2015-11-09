@extends('layouts.master')

@section('title', $title)

@section('content')

    <div class="container">

        @include('partials.page-head')

        <div>
            <a href="{{ route('posts.create') }}">Ask question</a>
        </div>

        <div class="row">

            @if(count($posts))

                @each('posts.single', $posts, 'post', 'posts.no-posts')

            @endif

        </div>
    </div>

@stop