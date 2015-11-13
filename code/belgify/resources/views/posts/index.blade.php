@extends('layouts.master')

@section('title', $title)

@section('content')

    <div class="posts-wrapper">

        @include('partials.page-head')

        <div class="container">

            @include('partials.search')

            @if(!Auth::check())
                <h3 class="dont-answer">Didn't find your answer? Login or sign up to start a new conversation</h3>

                <h3 class="add">
                    <a href="{{ url('/auth/login .content') }}" data-url="{{ route('posts.create') }}" data-toggle="modal" data-target="#myModal">Ask question</a>
                </h3>

            @else

                <h3 class="add">
                    <a href="{{ url('/posts/create .post') }}" data-toggle="modal" data-target="#myModal">Ask question</a>
                </h3>

            @endif



            <div class="row">

                @if(count($posts))

                    @each('partials.dashboard.my_question', $posts, 'post', 'posts.no-posts')

                @endif

            </div>
        </div>

    </div>

@stop