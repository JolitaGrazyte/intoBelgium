@extends('layouts.master')

@section('title', $title)

@section('content')

   <div class="container">

       @include('partials.message')

       @include('partials.errors')

       <h1>{{ $title }}</h1>

       @include('partials.search')

       <div><a href="{{ route('posts.create') }}">Ask a question</a></div>

       @if(count($posts))

           @foreach($posts as $post)

               <div class="row">

                   <div class="col-md-2">

                       <div><a href="{{ route('posts.show', $post->id) }}">Answers: </a> <span> {{ $post->comments->count() }}</span></div>

                       <div>VOTES: <span> {{ $votes[$post->id] }}</span></div>

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

               @if(!Auth::guest())

                   @if( Auth::user()->id == $post->user_id )

                       <div class="row col-md-offset-2">

                           <div class="col-md-2"><a href="{{ route('comments.create') }}" class="btn btn-link">answer this question</a></div>

                           <div class="col-md-2"><a href="{{ route('posts.edit', $post->id) }}" class="btn btn-link">update this question</a></div>

                           <div class="col-md-2">
                               {!!Form::open(['route' => ['posts.destroy', $post->id], 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'DELETE'])  !!}

                               <div class="form-group">

                                   <div class="col-md-12">

                                       {!! Form::submit('delete', ['class' => 'btn btn-link']) !!}

                                   </div>

                               </div>

                               {!!Form::close() !!}

                           </div>

                       </div>

                   @endif
               @endif


           @endforeach

       @endif

   </div>

@stop