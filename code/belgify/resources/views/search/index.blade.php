@extends('layouts.master')

@section('title', $title)

@section('content')

    <div class="container">

        @include('partials.page-head')

        <div class="row">

            @if(isset($search_results))

                @each('search.single', $search_results, 'search_result', 'search.no-results')

            @endif

        </div>
    </div>

@stop