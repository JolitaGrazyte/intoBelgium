<div class="d-event">

    <div class="row">
        <div class="col-md-3 date">
            <div class="event-dates">
                <div class="day">{{ $event->date->day }}</div>
                <div class="month">{{ $event->date->format('F') }}</div>
                <div class="year">{{ $event->date->year }}</div>
                <div class="hour">{{ $event->date->format('H\hi') }} </div>
            </div>
        </div>

        <div class="col-md-8 event-detail">

            <h1 class="title">{{ $event->title }}</h1>


            @if(Request::is('events/*') && !$auth->isAuthor($event->author))

                {!! Form::open(['route' => ['attend', $event->id], 'class' => 'form-horizontal', 'role' => 'form'])  !!}


                <div class="form-group">

                    {!! Form::hidden('going', $event['attending'], ['class' => '', 'onchange' => 'this.form.submit())']) !!}

                    {!! Form::submit(($isAttending)?' Going':'+ Check in', ['class' => $isAttending? 'btn btn-going' : 'btn  btn-primary btn-attend']) !!}

                </div>

                {!!Form::close() !!}

            @endif

        </div>
    </div>

    <div class="row">

        <div class="col-md-3">
        </div>

        <div class="col-md-8 author">
            <div class="img-wrapper">
                @if( count($event->author->avatar) )

                    <img class="events-profile-img" src="{{ route('getImage', [$event->author->avatar->filename, 'small']) }}" alt="{{ $event->author->avatar->name }}" width="50">

                @else

                    <img class="events-profile-img" src="{{ url('/img/Profile_Dummy.png') }}" alt="profile dummy">

                @endif

                <a href="{{ route('profile.show', str_replace(' ', '-', $event->author->username ) ) }}">{{ $event->author->username }}</a>
            </div>
        </div>

    </div>

    <div class="row">

        <div class="col-md-3">
            <p class="subtitle">Description</p>
        </div>

        <div class="col-md-8 event-detail">

            <p class="attenders"> {{ $event->attenders->count()}} participants</p>

            <p class="description">{{ $event->description }}</p>


        </div>
    </div>

    <div class="row">

        <div class="col-md-3">
            <p class="subtitle">Address</p>
        </div>

        <div class="col-md-8 event-detail">
            <p class="street">{{ $event->street_address }}</p>
            <p class="city"> {{ $event->location->name }} </p>
        </div>
    </div>

    <div class="row map-row">
        <div id="map"></div>
    </div>

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


</div>
