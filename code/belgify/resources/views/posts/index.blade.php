@extends('layouts.master')

@section('title', $title)

@section('content')

    @include('layouts.message')

    <h1>{{ $title }}</h1>

    <div><a href="{{ route('posts.create') }}">Ask a question</a></div>

    @if(count($posts))

        @foreach($posts as $post)

            <div> {{ $post }} </div>
            <div>
                Tags:
                @foreach($post->tags as $tag)

                    {{ $tag->name }}

                @endforeach
            </div>

            <div><a href="{{ route('posts.edit', $post->id) }}">update this post</a></div> 
            <div><a href="{{ route('posts.show', $post->id) }}">Answers: </a> <span> {{ $post->comments->count() }}</span></div>
            <div>VOTES: <span> {{ $votes }}</span></div>
            
            <div>
                {!!Form::open(['route' => ['posts.destroy', $post->id], 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'DELETE'])  !!}
                
                <div class="form-group">
                    <div class="col-md-2">

                        {!! Form::submit('delete', ['class' => 'btn btn-primary form-control']) !!}

                    </div>
                </div>
                {!!Form::close() !!}
            </div>


        @endforeach

    @endif


@stop