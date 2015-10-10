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

                        {!!Form::open(['route' => 'events.store', 'class' => 'form-horizontal', 'role' => 'form'])  !!}

                        <div class="form-group">

                            {!! Form::label('title', 'Title', ['class' => 'col-md-2 control-label']) !!}

                            <div class="col-md-10">

                                {!! Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'title']) !!}

                            </div>
                        </div>

                        <div class="form-group">

                            {!! Form::label('description', 'Description', ['class' => 'col-md-2 control-label']) !!}

                            <div class="col-md-10">

                                {!! Form::textarea('description', null, ['class' => 'form-control',  'placeholder' => 'type a description in here']) !!}

                            </div>

                        </div>

                        <div class="form-group">

                            {!! Form::label('street_address', 'Street Address', ['class' => 'col-md-2 control-label']) !!}

                            <div class="col-md-10">

                                {!! Form::text('street_address', null, ['class' => 'form-control', 'placeholder' => 'street, house / building nr., evt.: flat nr. ']) !!}

                            </div>
                        </div>


                        <div class="form-group">

                            {!! Form::label('location', 'Location', ['class' => 'col-md-2 control-label']) !!}

                            <div class="col-md-10">

                                {!! Form::select('location', $locations, null, ['class' => 'form-control', 'placeholder' => 'choose a location']) !!}

                            </div>
                        </div>

                        <div class="form-group">

                            {!! Form::label('postcode', 'Postcode', ['class' => 'col-md-2 control-label']) !!}

                            <div class="col-md-10">

                                {!! Form::text('postcode', null, ['class' => 'form-control', 'placeholder' => 'postcode']) !!}

                            </div>
                        </div>

                        <div class="form-group">

                            {!! Form::label('tags', 'Tags', ['class' => 'col-md-2 control-label']) !!}

                            <div class="col-md-10">

                                {!! Form::select('tag_list[]', ['tag1', 'tag2', 'tag3'], null, [ 'id' => 'tag_list', 'class' => 'form-control',  'multiple']) !!}

                            </div>

                        </div>

                        <div class="form-group">

                            {!! Form::label('publish_on', 'Publish on', ['class' => 'col-md-2 control-label']) !!}

                            <div class="col-md-10">

                                {!! Form::date('publish_on', \Carbon\Carbon::now(), ['class' => 'form-control']) !!}

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
    </script>
@stop