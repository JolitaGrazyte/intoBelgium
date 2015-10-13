@extends('layouts.master')

@section('title', $title)

@section('content')

    <h1> {{ $title }} </h1>

    <div class="container-fluid">

        <div class="row">

           <div class="col-md-8">

               <div>

                   @include('dashboard.partials.my_events')

               </div>


               <div>

                   @include('dashboard.partials.my_questions')

               </div>

           </div>

              <div class="col-md-4">

                  @include('dashboard.partials.following')

              </div>

        </div>
    </div>

@stop
