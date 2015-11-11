@extends('layouts.master')

@section('title', $title)

@section('content')

    {{--{{ session('eventDelete') }}--}}

    <div class="events-wrapper">

        @include('partials.page-head')

        <div class="container">

            <div class="row">

            @if (Session::has('confirmDelete'))

               <div class="">

                   <a href="{{ action('EventsController@destroy', Session::get('eventDelete')) }}">Yes</a> || <a href="{{ route('events.index') }}">Cancel</a>

               </div>

            @endif

                @include('partials.search')

            @if(Auth::check() && $auth->isLocal())

               <h3 class="add"><a href="{{ route('events.create') }}">Add new event</a></h3>

            @endif


               @if(count($events))

                   @each('partials.dashboard.my_event', $events, 'event', 'events.no-events')

               @endif

           </div>

        </div>
    </div>


   <style>

       #map {
           width: 100%;
           height: 300px;
           position: relative;
           bottom: 0;
           top: 10rem;
           left: -1%;
       }
   </style>

   <div id="map"></div>

   <script>

       function initMap() {

           var myLatLng = {lat: 51.267927, lng: 4.280785};

           // Create a map object and specify the DOM element for display.
           var map = new google.maps.Map(document.getElementById('map'), {
               center: myLatLng,
               scrollwheel: false,
               zoom: 8
           });

           // Create a marker and set its position.
           var marker = new google.maps.Marker({
               map: map,
               position: myLatLng,
               title: 'Hello World!'
           });
       }
   </script>

   <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAKaXXwRRFB5xspfUFO0bYzu-wHudH3DfU&callback=initMap"
           async defer></script>


@stop