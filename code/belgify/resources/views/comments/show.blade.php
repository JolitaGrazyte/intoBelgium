@extends('layouts.master')

@section('title', 'Answer')

@section('content')

    <h1>Answer</h1>
    {{--<h1>{{ $title }}</h1>--}}

    <div class="row">

        <div class="col-md-10">

            <div class="">

                @include('partials.errors')

                <div>{{ $comment->body }}</div>

            </div>
        </div>
    </div>

@stop