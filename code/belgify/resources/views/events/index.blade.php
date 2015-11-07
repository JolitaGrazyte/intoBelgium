@extends('layouts.master')

@section('title', $title)

@section('content')

   <div class="container">

      @include('partials.page-head')

       @if(Auth::user()->isLocal())

           <div><a href="{{ route('events.create') }}">Add new event</a></div>

       @endif

       <div class="row">

           @if(isset($eventsData))

               @each('events.single', $eventsData, 'event', 'no-events')

           @endif

       </div>

   </div>


   <style>

       #map {
           width: 105%;
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