@extends('layouts.master')

@section('title', $title)

@section('title', 'Create')

@section('content')


    <div class="row">

        <div class="col-md-2">

            @include('partials.side-nav')

        </div>

        <div class="col-md-10 col-post ">
            <div class="container post">
                <div class="row post-form">

                    <div class="col-md-12">
                        <h1>{{ $title }}</h1>
                    </div>

                    @include('partials.errors')

                        {!!Form::open(['route' => 'comments.store', 'class' => 'form-horizontal', 'role' => 'form'])  !!}

                        {!! Form::hidden('post_id', $post->id) !!}

                        <div class="form-group">
                            <div class="col-md-12">
                                <div id="body-group">
                                    <p class="help-text"></p>
                                    {!! Form::textarea('body', null, ['class' => 'form-control',  'placeholder' => 'Place your answer here']) !!}
                                </div>
                            </div>
                        </div>

                        <div class="form-group">

                            <div class="col-md-12">
                                <div id="tag_list-group">
                                    <p class="help-text"></p>
                                    {!! Form::select('tag_list[]', $tags, null, [ 'id' => 'tag_list', 'class' => 'form-control',  'multiple']) !!}
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12">

                                {!! Form::submit('Post', ['class' => 'btn btn-primary form-control btn-add']) !!}

                            </div>
                        </div>

                        {!! Form::close() !!}

                    </div>
                </div>
            </div>

    </div>

    <script>
        $('#tag_list').select2({placeholder:'please, choose some keywords'});
    </script>
@stop