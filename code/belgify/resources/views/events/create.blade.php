@extends('layouts.master')

@section('title', $title)

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

                    {!!Form::open(['route' => 'events.store', 'class' => 'form-horizontal', 'role' => 'form'])  !!}

                    @include('events.form')

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

    <script>
        $('#tag_list').select2({placeholder:'please, choose some keywords'});
        $( "#datetimepicker" ).datetimepicker();

    </script>
@stop