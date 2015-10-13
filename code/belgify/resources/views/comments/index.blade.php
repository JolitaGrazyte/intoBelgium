@extends('layouts.master')

@section('title', $title)

@section('content')

    <h1>{{ $title }}</h1>

    <div class="container-fluid">

        <div class="row">

            <div class="col-md-10">

                <div class="panel panel-default">

                    <div class="panel-heading">Answer</div>

                    <div class="panel-body">

                        @include('errors.errors')

                        <strong><em> {{ $post->title }} </em></strong>

                        <div>{{ $post->body }}</div>

                        @foreach($answers as $answer)

                            <div> {{ $answer->body }}</div>

                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>

@stop