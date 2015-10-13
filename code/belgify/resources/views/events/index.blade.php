@extends('layouts.master')

@section('title', $title)

@section('content')

    @include('layouts.message')

    <h1>{{ $title }}</h1>

    <div><a href="{{ route('events.create') }}">Add new event</a></div>

    @if(count($events))

        @foreach($events as $event)

            <div> {{ $event }} </div>

            <div> Tags: @foreach($event->tags as $tag)

                    {{$tag->name}}

                @endforeach

            </div>

            <div>
                {!!Form::open(['route' => ['attend', $event->id], 'class' => 'form-horizontal', 'role' => 'form'])  !!}

                <div class="form-group">

                    {!! Form::label('going', 'Going', ['class' => 'col-md-1 control-label']) !!}

                    <div class="col-md-2">

                        {!! Form::checkbox('going', 'going', 0, ['class' => 'btn btn-primary form-control', 'onchange' => 'this.form.submit()']) !!}

                    </div>

                </div>
                {!!Form::close() !!}
            </div>


            <div><a href="{{ route('events.edit', $event->id) }}">update this event</a></div>
            <div>
                {!!Form::open(['route' => ['events.destroy', $event->id], 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'DELETE'])  !!}
                <div class="form-group">
                    <div class="col-md-2">

                        {!! Form::submit('delete', ['class' => 'btn btn-primary form-control']) !!}

                    </div>
                </div>
                {!!Form::close() !!}
            </div>


        @endforeach

    @endif


@stop