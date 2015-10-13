@extends('layouts.master')

@section('title', 'Answers')

@section('content')

    <h1>Answers</h1>
{{--    <h1>{{ $title }}</h1>--}}

    <div class="container-fluid">

        <div class="row">

            <div class="col-md-10">

                <div class="panel panel-default">

                    <div class="panel-heading">Answer</div>

                    <div class="panel-body">

                        @include('errors.errors')

                        <strong><em> {{ $post->title }} </em></strong>

                        <div>{{ $post->body }}</div>

                        @foreach($answers as $key => $answer)

                            <div> {{ $key.'. '.$answer->body }}</div>

                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>

@stop