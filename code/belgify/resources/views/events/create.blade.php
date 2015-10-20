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

                        {!!Form::open(['route' => 'events.store', 'class' => 'form-horizontal', 'role' => 'form'])  !!}


                        {{--<div class="row">--}}
                            {{--<div class="col-md-12">--}}
                                {{--<h6>datetimepicker1</h6>--}}

                                {{--<div class="form-group">--}}
                                    {{--<div class="input-group date" id="datetimepicker1">--}}
                                        {{--<input type="text" class="form-control" />	<span class="input-group-addon"><span class="glyphicon-calendar glyphicon"></span></span>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                                {{--<h6>datetimepicker2</h6>--}}

                                {{--<input type="text" class="form-control" id="datetimepicker2" />--}}
                            {{--</div>--}}
                        {{--</div>--}}

                        <div class="form-group">

                            {!! Form::label('title', 'Title', ['class' => 'col-md-2 control-label']) !!}

                            <div class="col-md-10">

                                {!! Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'title']) !!}

                            </div>

                        </div>

                        <div class="form-group">

                            {!! Form::label('date', 'Date and time', ['class' => 'col-md-2 control-label']) !!}

                            <div class="input-group date col-md-9" id="datetimepicker">
                                {!! Form::text('date', null, ['class' => 'form-control', 'placeholder' => \Carbon\Carbon::now()->format('d/m/Y H:i  ')]) !!}

                                {{--{!! Form::text('date', \Carbon\Carbon::now()->format('d/m/Y'), ['class' => 'col-md-10 form-control']) !!}--}}
                                <span class="input-group-addon"><span class="glyphicon-calendar glyphicon"></span></span>

                            </div>
                        </div>

                        {{--<div class="form-group">--}}

                            {{--{!! Form::label('date', 'Date', ['class' => 'col-md-2 control-label']) !!}--}}

                            {{--<div class="col-md-10">--}}

                                {{--{!! Form::text('date', \Carbon\Carbon::now()->format('d/m/Y'), ['id' => 'datetimepicker', 'class' => 'form-control']) !!}--}}
                                {{--<span class="glyphicon-calendar glyphicon"></span>--}}

                            {{--</div>--}}

                        {{--</div>--}}

                        {{--<div class="form-group">--}}

                            {{--{!! Form::label('start_time', 'Start time', ['class' => 'col-md-2 control-label']) !!}--}}

                            {{--<div class="col-md-10">--}}

                                {{--{!! Form::input('time', 'start_time',  \Carbon\Carbon::now()->format('H:m'),  ['class' => 'col-md-2 control-label']) !!}--}}

                            {{--</div>--}}

                        {{--</div>--}}

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

                                {!! Form::select('location_id', $locations, null, ['class' => 'form-control', 'placeholder' => 'choose a location']) !!}

                            </div>

                        </div>

                        <div class="form-group">

                            {!! Form::label('tags', 'Tags', ['class' => 'col-md-2 control-label']) !!}

                            <div class="col-md-10">

                                {!! Form::select('tag_list[]', $tags, null, [ 'id' => 'tag_list', 'class' => 'form-control',  'multiple']) !!}

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
        $('#datetimepicker').datetimepicker();

    </script>
@stop