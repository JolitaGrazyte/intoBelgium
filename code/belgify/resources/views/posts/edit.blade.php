@extends('layouts.master')

@section('title', $title)

@section('content')

    <div class="row">

        <div class="col-md-2">

            @include('partials.side-nav')

        </div>

        <div class="col-md-6">

            <h1>{{ $title }}</h1>

            <div class="panel panel-default">

                <div class="panel-body">

                    @include('partials.errors')

                    {!!Form::open(['route' => ['posts.update', $id], 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'PATCH'])  !!}

                    @include('posts.form')


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

    <script>
        $('#tag_list').select2({placeholder:'please, choose some keywords'});

        $(function() {
            $( "#datepicker" ).datepicker();
        });
    </script>

@stop