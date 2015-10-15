@extends('layouts.master')

@section('title', $title)

@section('content')

    @include('layouts.message')

    <h1>{{ $title }}</h1>

    <div><a href="{{ route('posts.create') }}">Ask a question</a></div>

    @if(count($posts))

        @foreach($posts as $post)

            <div class="row">

                <div class="col-md-2">

                    <div><a href="{{ route('posts.show', $post->id) }}">Answers: </a> <span> {{ $post->comments->count() }}</span></div>

                    <div>VOTES: <span> {{ $votes }}</span></div>

                </div>

                <div class="col-md-10">

                    <div> {{ $post }} </div>

                    <div>
                        @if(count($post->tags))
                            Tags:
                            @foreach($post->tags as $tag)

                                {{ $tag->name }}

                            @endforeach

                        @endif
                    </div>

                </div>

            </div>




            @if( Auth::user()->id == $post->user_id )

                <div class="row col-md-offset-2">

                    <div class="col-md-2"><a href="{{ route('comments.create') }}"><button class="btn btn-primary">answer this question</button></a></div>

                    <div class="col-md-2"><a href="{{ route('posts.edit', $post->id) }}"><button class="btn btn-primary">update this question</button></a></div>

                    <div class="col-md-2">
                        {!!Form::open(['route' => ['posts.destroy', $post->id], 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'DELETE'])  !!}

                        <div class="form-group">

                            <div class="col-md-12">

                                {!! Form::submit('delete', ['class' => 'btn btn-primary form-control']) !!}

                            </div>

                        </div>

                        {!!Form::close() !!}

                    </div>

                </div>

            @endif


        @endforeach

    @endif


@stop