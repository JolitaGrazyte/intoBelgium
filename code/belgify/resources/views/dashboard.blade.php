@extends('layouts.master')

@section('title', $title)

@section('content')


        <div class="row">

            <div class="col-md-2">

                @include('partials.side-nav')

            </div>

            <div class="col-md-7">

               @include('partials.page-head')

                @if(Request::is('dashboard/my-events') )

                    <div>

                        @include('partials.dashboard.my_events')

                    </div>

                @elseif(Request::is('dashboard/my-questions') )

                    <div>

                        @include('partials.dashboard.my_questions')

                    </div>

                @elseif(Request::is('dashboard') )

                    <div>

                        @include('partials.dashboard.following')

                    </div>

                @endif
            </div>

        </div>

@stop
