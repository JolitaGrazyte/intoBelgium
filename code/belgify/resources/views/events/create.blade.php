@extends('layouts.master')

@section('title', $title)

@section('content')

    <h1>{{ $title }}</h1>

    <div class="container-fluid">

        <div class="row">

            <div class="col-md-8 col-md-offset-2">

                <div class="panel panel-default">

                    <div class="panel-heading">Ask a question</div>

                    <div class="panel-body">

                        @include('errors.errors')

                        {!!Form::open(['route' => 'events.create', 'class' => 'form-horizontal', 'role' => 'form'])  !!}

                        <div class="form-group">

                            {!! Form::label('title', 'Title', ['class' => 'col-md-4 control-label']) !!}

                            <div class="col-md-6">

                                {!! Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'titlel']) !!}

                            </div>
                        </div>

                        <div class="form-group">

                            {!! Form::label('description', 'Description', ['class' => 'col-md-4 control-label']) !!}

                            <div class="col-md-6">

                                {!! Form::textarea('description', null, ['class' => 'form-control',  'placeholder' => 'type a description in here']) !!}

                            </div>

                        </div>

                        <div class="form-group">

                            {!! Form::label('tags', 'Tags', ['class' => 'col-md-4 control-label']) !!}

                            <div class="col-md-6">

                                {!! Form::select('tag_list[]', ['tag1', 'tag2', 'tag3'], null, [ 'id' => 'tag_list', 'class' => 'form-control',  'multiple']) !!}

                            </div>

                        </div>

                        <div class="form-group">

                            {!! Form::label('publish_on', 'Publish on', ['class' => 'col-md-4 control-label']) !!}

                            <div class="col-md-6">

                                {!! Form::date('publish_on', \Carbon\Carbon::now(), ['class' => 'form-control']) !!}

                            </div>

                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">

                                {!! Form::submit('Post', ['class' => 'btn btn-primary']) !!}

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