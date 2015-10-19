@extends('layouts.master')

@section('title', 'Home')

@section('content')

    @include('layouts.message')

    @include('errors.errors')

    <div class="home_header">
        <div class="container">

            <h3 class="quote">“Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua”</h3>

            {!!Form::open(['route' => ['search'], 'class' => 'form-horizontal', 'role' => 'form' ])  !!}

            {!! Form::text('keyword', null, ['placeholder' => 'search', 'class' => 'col-md-9']) !!}
            {!! Form::submit('search', ['class' => 'btn btn-primary col-md-3']) !!}

            {!!Form::close() !!}
        </div>
    </div>



@stop