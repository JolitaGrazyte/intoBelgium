@extends('layouts.master')

@section('title', 'Answers')

@section('content')

    <div class="container">

        <div class="row">

            @include('partials.page-head')

            <div class="col-md-10">

                <strong><em> {{ $post->title }} </em></strong>

                <p><em> posted on: {{ $post->created_at->diffforHumans() }}</em></p>

                <p>{{ $post->body }}</p>

                @foreach($answers as $answer)

                    <p><a href="{{ route('comments.show', [$answer->id]) }}">{{ $answer->id.'. '.$answer->body }}</a></p>

                @endforeach

            </div>

        </div>

    </div>

@stop