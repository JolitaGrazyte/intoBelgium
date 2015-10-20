@extends('layouts.master')

@section('title', $title)

@section('content')

    @include('layouts.message')

    @include('errors.errors')

        <div class="row">

            <div class="col-md-2">

                @include('layouts.side-nav')

            </div>

            <div class="col-md-7">

                <h1> {{ $title }} </h1>

                @if(Request::is('dashboard/my-events') )

                    <div>

                        @include('dashboard.partials.my_events')

                    </div>

                @elseif(Request::is('dashboard/my-questions') )

                    <div>

                        @include('dashboard.partials.my_questions')

                    </div>

                @elseif(Request::is('dashboard') )

                    <div>

                        @include('dashboard.partials.following')

                    </div>

                @endif
            </div>

        </div>

@stop
