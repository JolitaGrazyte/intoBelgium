@extends('layouts.master')

@section('title', $title)

@section('content')

    <div class="container">

        @include('partials.page-head')

        <div class="row">


{{--                @if(count($search_results['tours']))--}}

                    @if(count($search_results))

                    {{--@foreach($search_results as $search_result)--}}

                        @each('search.single', $search_results, 'result')

                    {{--@endforeach--}}

                {{--@foreach($tours as $tour)--}}

                    {{--<div class="col-md-10">--}}

                        {{--<hr>--}}

                        {{--<h3> {{ $tour->title }}</h3>--}}
                        {{--<p> {{ $tour->description }}</p>--}}

                    {{--</div>--}}

                {{--@endforeach--}}
            @endif


                    {{--@each('search.single', $search_results['tours'], 'result', 'search.no-results')--}}

                {{--@endif--}}



                {{--@if(count($search_results['questions']))--}}

                    {{--@each('search.single', $search_results['questions'], 'result', 'search.no-results')--}}


                {{--@endif--}}


        </div>
    </div>

@stop