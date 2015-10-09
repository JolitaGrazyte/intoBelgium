@extends('layouts.master')

{{--@section('title', $title)--}}

@section('title', 'Create')

@section('content')

    <h1>Ask a question</h1>
    {{--<h1>{{ $title }}</h1>--}}

    <div class="container-fluid">

        <div class="row">

            <div class="col-md-8 col-md-offset-2">

                <div class="panel panel-default">

                    <div class="panel-heading">Ask a question</div>

                    <div class="panel-body">

                        @include('errors.errors')

                        {!!Form::open(['route' => 'posts.create', 'class' => 'form-horizontal', 'role' => 'form'])  !!}

                        <div class="form-group">

                            {!! Form::label('title', 'Title', ['class' => 'col-md-4 control-label']) !!}

                            <div class="col-md-6">

                                {!! Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'titlel']) !!}

                            </div>
                        </div>

                        <div class="form-group">

                            {!! Form::label('body', 'Body', ['class' => 'col-md-4 control-label']) !!}

                            <div class="col-md-6">

                                {!! Form::textarea('body', null, ['class' => 'form-control',  'placeholder' => 'ask here your question']) !!}

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


@stop