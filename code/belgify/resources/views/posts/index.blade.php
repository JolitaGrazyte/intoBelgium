@extends('layouts.master')

@section('title', $title)

@section('content')

    <div class="posts-wrapper">

        @include('partials.page-head')

        <div class="container">

            @include('partials.search')

            @if (Session::has('confirmDelete'))

                <div class="alert alert-danger ">

                    <span>Are you sure you want to remove your post ? </span>

                    <a href="{{ route('post-delete', session('confirmDelete')) }}">Yes</a> || <a href="">Cancel</a>

                </div>

            @endif

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

                @if(isset($posts))

                    @each('dashboard.my_question', $posts, 'post', 'posts.no-posts')

                @endif

            </div>
        </div>

    </div>

@stop