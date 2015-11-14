@extends('layouts.master')

@section('title', $title)

@section('content')

    <div class="row ">

        <div class="col-md-2">

            @include('partials.side-nav')

        </div>

        <div class="col-md-10">
            <div class="container post">
                <div class="row post-form">

                    <div class="col-md-12">
                        <h1>{{ $title }}</h1>
                    </div>


                    @include('partials.errors')

                    {!!Form::open(['route' => 'posts.store', 'class' => 'form-horizontal', 'role' => 'form'])  !!}

                    @include('posts.form')

                    <div class="form-group">

                        <div class="col-md-12">

                            {!! Form::submit('Post', ['class' => 'btn btn-primary form-control btn-add']) !!}

                        </div>
                    </div>

                    {!! Form::close() !!}
                </div>


                <script>
                    $('#tag_list').select2({placeholder:'please, choose some keywords'});
                </script>

            </div>

        </div>

    </div>



@stop