@extends('layouts.master')

@section('title', 'Home')

@section('content')

    @include('layouts.message')

    @include('errors.errors')

    <div class="home_header">
        <div class="container">

            <h3 class="quote">“Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua”</h3>

            {!!Form::open(['route' => ['search'], 'class' => 'form-horizontal search-form', 'role' => 'form' ])  !!}

            {!! Form::text('keyword', null, ['placeholder' => 'Ask a question about the Belgian lifestyle...', 'class' => 'col-md-9 text-search']) !!}
            {!! Form::submit('search', ['class' => 'btn btn-primary col-md-3 btn-search']) !!}

            {!!Form::close() !!}
        </div>
    </div>



@stop