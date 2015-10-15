@extends('layouts.master')

@section('title', $title)

@section('content')

    <h1>{{ $title }}</h1>

    <div class="container-fluid">

        <div class="row">

            <div class="col-md-10">

                <div class="panel panel-default">

                    <div class="panel-heading">Ask a question</div>

                    <div class="panel-body">

                        @include('errors.errors')

                        {!!Form::open(['route' => ['posts.update', $id], 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'PATCH'])  !!}

                        <div class="form-group">

                            {!! Form::label('title', 'Title', ['class' => 'col-md-2 control-label']) !!}

                            <div class="col-md-10">

                                {!! Form::text('title', $post->title, ['class' => 'form-control', 'placeholder' => 'title']) !!}

                            </div>
                        </div>


                        <div class="form-group">

                            {!! Form::label('body', 'Body', ['class' => 'col-md-2 control-label']) !!}

                            <div class="col-md-10">

                                {!! Form::textarea('body', $post->body, ['class' => 'form-control',  'placeholder' => 'ask here your question']) !!}

                            </div>

                        </div>

                        <div class="form-group">

                            {!! Form::label('tags', 'Tags', ['class' => 'col-md-2 control-label']) !!}

                            <div class="col-md-10">

                                {!! Form::select('tag_list[]', $tags , $post_tags, [ 'id' => 'tag_list', 'class' => 'form-control',  'multiple']) !!}


                            </div>

                        </div>


                        <div class="form-group">

                            <div class="col-md-10 col-md-offset-2">

                                {!! Form::submit('Post', ['class' => 'btn btn-primary form-control']) !!}

                            </div>

                        </div>

                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $('#tag_list').select2();

        $(function() {
            $( "#datepicker" ).datepicker();
        });
    </script>

@stop