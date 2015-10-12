@extends('layouts.master')

@section('title', $title)

@section('title', 'Create')

@section('content')

    <h1>{{ $title }}</h1>

    <div class="container-fluid">

        <div class="row">

            <div class="col-md-9">

                <div class="panel panel-default">

                    <div class="panel-heading">Ask a question</div>

                    <div class="panel-body">

                        @include('errors.errors')

                        {!!Form::open(['route' => 'posts.create', 'class' => 'form-horizontal', 'role' => 'form'])  !!}

                        <div class="form-group">

                            {!! Form::label('title', 'Title', ['class' => 'col-md-1 control-label']) !!}

                            <div class="col-md-11">

                                {!! Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'titlel']) !!}

                            </div>
                        </div>

                        <div class="form-group">

                            {!! Form::label('body', 'Body', ['class' => 'col-md-1 control-label']) !!}

                            <div class="col-md-11">

                                {!! Form::textarea('body', null, ['class' => 'form-control',  'placeholder' => 'ask here your question']) !!}

                            </div>

                        </div>

                        <div class="form-group">

                            {!! Form::label('tags', 'Tags', ['class' => 'col-md-1 control-label']) !!}

                            <div class="col-md-11">

                                {!! Form::select('tag_list[]', $tags, null, [ 'id' => 'tag_list', 'class' => 'form-control',  'multiple']) !!}

                            </div>

                        </div>

                        <div class="form-group">
                            <div class="col-md-11 col-md-offset-1">

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
    </script>
@stop