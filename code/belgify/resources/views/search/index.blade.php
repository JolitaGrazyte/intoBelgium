@extends('layouts.master')

@section('title', $title)

@section('content')

    <div class="container">

        {{--@include('partials.page-head')--}}

        <div class="row">

                @each('search.single', $search_results, 'result', 'search.no-results')

        </div>
    </div>

@stop