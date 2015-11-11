@extends('layouts.master')

@section('title', 'Home')

@section('content')

    @include('partials.message')





    <div class="home_header">

        <div class="container">

            <h3 class="quote">“Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua”</h3>

            @include('partials.search')

        </div>


    </div>



@stop