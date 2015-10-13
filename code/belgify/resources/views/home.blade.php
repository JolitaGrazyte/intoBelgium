@extends('layouts.master')

@section('title', 'Home')

@section('content')

    <h1>HOME</h1>


        {!!Form::open(['route' => ['search'], 'class' => 'form-horizontal', 'role' => 'form', ])  !!}

                {!! Form::text('search_input', null, ['placeholder' => 'search', 'class' => 'col-md-6']) !!}
                {!! Form::submit('search', ['class' => 'btn btn-primary col-md-2']) !!}

        {!!Form::close() !!}

@stop