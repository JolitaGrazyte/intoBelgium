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

                        @include('partials.errors')

                        {!!Form::open(['route' => ['events.update', $id], 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'PATCH'])  !!}

                        <div class="form-group">

                            {!! Form::label('title', 'Title', ['class' => 'col-md-2 control-label']) !!}

                            <div class="col-md-10">

                                {!! Form::text('title', $event->title, ['class' => 'form-control', 'placeholder' => 'title']) !!}

                            </div>
                        </div>

                        <div class="form-group">

                            {!! Form::label('date', 'Date', ['class' => 'col-md-2 control-label']) !!}

                            <div class="col-md-10">

                                {!! Form::text('date', $event->date, ['id' => 'datepicker', 'class' => 'form-control']) !!}

                            </div>

                        </div>


                        <div class="form-group">

                            {!! Form::label('description', 'Description', ['class' => 'col-md-2 control-label']) !!}

                            <div class="col-md-10">

                                {!! Form::textarea('description', $event->description, ['class' => 'form-control',  'placeholder' => 'type a description in here']) !!}

                            </div>

                        </div>

                        <div class="form-group">

                            {!! Form::label('street_address', 'Street Address', ['class' => 'col-md-2 control-label']) !!}

                            <div class="col-md-10">

                                {!! Form::text('street_address', $event->street_address, ['class' => 'form-control', 'placeholder' => 'street, house / building nr., evt.: flat nr. ']) !!}

                            </div>
                        </div>


                        <div class="form-group">

                            {!! Form::label('location', 'Location', ['class' => 'col-md-2 control-label']) !!}

                            <div class="col-md-10">

                                {!! Form::select('location', $locations, isset($event->location)?$event->location->id:0, ['class' => 'form-control', 'placeholder' => 'choose a location']) !!}

                            </div>
                        </div>

                        <div class="form-group">

                            {!! Form::label('postcode', 'Postcode', ['class' => 'col-md-2 control-label']) !!}

                            <div class="col-md-10">


                                {!! Form::text('postcode', $event->postcode, ['class' => 'form-control', 'placeholder' => 'postcode']) !!}

                            </div>
                        </div>

                        <div class="form-group">

                            {!! Form::label('tags', 'Tags', ['class' => 'col-md-2 control-label']) !!}

                            <div class="col-md-10">

                                {!! Form::select('tag_list[]', $tags, $evnt_tags, [ 'id' => 'tag_list', 'class' => 'form-control',  'multiple']) !!}

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