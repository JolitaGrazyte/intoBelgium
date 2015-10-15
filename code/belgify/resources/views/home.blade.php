@extends('layouts.master')

@section('title', 'Home')

@section('content')

    @include('layouts.message')

    @include('errors.errors')

    <h1>HOME</h1>


        {!!Form::open(['route' => ['search'], 'class' => 'form-horizontal', 'role' => 'form' ])  !!}

                {!! Form::text('keyword', null, ['placeholder' => 'search', 'class' => 'col-md-6']) !!}
                {!! Form::submit('search', ['class' => 'btn btn-primary col-md-2']) !!}

        {!!Form::close() !!}

@stop