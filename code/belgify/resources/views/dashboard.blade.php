@extends('layouts.master')

@section('title', 'Dashboard')

@section('content')

    <h1> Dashboard </h1>

    <div class="container-fluid">

        <div class="row">

            @if(count($my_events))

                <h2>My events</h2>

                @foreach($my_events as $event)

                    <div> {{ $event }} </div>

                    <div> Tags: @foreach($event->tags as $tag)

                            {{$tag->name}}

                        @endforeach

                    </div>

                @endforeach

            @endif

                @if(count($my_questions))

                    <h2>My questions</h2>

                    @foreach($my_questions as $question)

                        <div>Question: {{ $question }} </div>

                        <div> Tags: @foreach( $question->tags as $tag )

                                {{ $tag->name }}

                            @endforeach

                        </div>

                        <div> Answers: @foreach( $question->comments as $comment )

                                <p><a href="">{{ $comment->body }}</a></p>

                            @endforeach

                        </div>

                    @endforeach

                @endif

        </div>
    </div>

@stop
