@extends('layouts.master')

@section('title', $title)

@section('content')

    @include('layouts.message')

    <h1>{{ $title }}</h1>

    <div><a href="{{ route('events.create') }}">Add new event</a></div>

    <div class="row">


            {{--@if(isset($eventsData))--}}

            {{--{{dd($eventsData)}}--}}

            {{--<h2><em>Events</em></h2>--}}

            {{--@each('events.show', $eventsData, 'event');--}}

            {{--@endif--}}

            @if(isset($eventsData))

                @foreach($eventsData as $event )

                <div class="col-md-2">
                    <hr>
                    <div>{{ $event['d'] }}</div>
                    <div>{{ $event['fM'] }}</div>
                    <div>{{ $event['Y'] }}</div>

                </div>

                <div class="col-md-10">

                    <hr>

                    <div><a href="{{ route('events.show', $event['id']) }}">{{ $event['title'] }}</a></div>

                    <div><em>author: </em>{{ $event['author'] }}</div>
                
                    <div>{{ $event['description'] }}</div>

                    {!!Form::open(['route' => ['attend', $event['id']], 'class' => 'form-horizontal col-md-1', 'role' => 'form'])  !!}

                    @if(!$event['isAuthor'])

                        <div class="form-group">

                            {!! Form::label('going', 'Going', ['class' => 'control-label']) !!}


                            {!! Form::checkbox('going', 'going', $event['attending'], ['class' => '', 'onchange' => 'this.form.submit()']) !!}


                        </div>

                    @endif

                    {!!Form::close() !!}

                    @if($event['attending'])

                        <div>i'm attending</div>

                    @endif
                    
                    <div>{{ $event['attenders'] }}</div>

                    @if( $event['isAuthor'] )

                    <a href="{{ route('events.edit', $event['id']) }}" class="col-md-2 col-lg-offset-6 btn btn-link">update this event</a>

                    {!!Form::open(['route' => ['events.destroy', $event['id']], 'class' => 'form-horizontal col-md-2', 'role' => 'form', 'method' => 'DELETE'])  !!}


                    {!! Form::submit('delete', ['class' => 'btn btn-link   ']) !!}


                    {!!Form::close() !!}


                    @endif

                </div>
                @endforeach
            @endif

        </div>




    {{--@if(count($events))--}}

    {{--@foreach($events as $event)--}}

    {{--<div class="row">--}}
    {{--<div class="col-md-12">--}}
    {{--<div> {{ $event }} </div>--}}

    {{--@if(count($event->tags))--}}

    {{--<div> Tags:--}}

    {{--@foreach($event->tags as $tag)--}}

    {{--{{ $tag->name }}--}}

    {{--@endforeach--}}

    {{--</div>--}}

    {{--@endif--}}
    {{--</div>--}}

    {{--</div>--}}

    {{--<div class="row">--}}
    {{--<div class="col-md-1">--}}

    {{--{!!Form::open(['route' => ['attend', $event->id], 'class' => 'form-horizontal', 'role' => 'form'])  !!}--}}

    {{--<div class="form-group">--}}

    {{--{!! Form::label('going', 'Going', ['class' => 'col-md-6 control-label']) !!}--}}

    {{--<div class="col-md-6">--}}

    {{--{!! Form::checkbox('going', 'going', 0, ['class' => 'btn btn-primary form-control', 'onchange' => 'this.form.submit()']) !!}--}}

    {{--</div>--}}

    {{--</div>--}}

    {{--{!!Form::close() !!}--}}

    {{--</div>--}}

    {{--{!!Form::open(['route' => ['events.destroy', $event->id], 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'DELETE'])  !!}--}}


    {{--{!! Form::submit('delete', ['class' => 'btn btn-primary form-control']) !!}--}}


    {{--{!!Form::close() !!}--}}




    {{--@if( Auth::user()->id == $event->user_id )--}}

    {{--<a href="{{ route('events.edit', $event->id) }}">update this event</a>--}}

    {{--@endif--}}

    {{--</div>--}}

    {{--@endforeach--}}

    {{--@endif--}}


@stop