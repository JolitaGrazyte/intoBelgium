@extends('layouts.master')

@section('title', 'Events')

@section('content')

    <h1>SINGLE EVENT</h1>

    <div><a href="{{ route('events.show', $event['id']) }}">{{ $event['title'] }}</a></div>

    <div><em>author: </em>{{ $event['author'] }}</div>

    <div>{{ $event['description'] }}</div>

    {!!Form::open(['route' => ['attend', $event['id']], 'class' => 'form-horizontal', 'role' => 'form'])  !!}

    <div class="form-group">

        {!! Form::label('going', 'Going', ['class' => 'col-md-6 control-label']) !!}

        <div class="col-md-6">

            {!! Form::checkbox('going', 'going', $event['attending'], ['class' => 'btn btn-primary form-control', 'onchange' => 'this.form.submit()']) !!}

        </div>

    </div>

    {!!Form::close() !!}

    {{--<div>{{ $event['attending'] }}</div>--}}

@stop

