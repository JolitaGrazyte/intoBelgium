<div class="row d-event">
    <div class="col-md-2 d-event-date">
        <div>
            <div class="day">{{ $event->date->day }}</div>
            <div class="month">{{ $event->date->format('F') }}</div>
            <div class="year">{{ $event->date->year }}</div>
        </div>

    </div>

    <div class="col-md-10 d-event-detail">
        <h2> {{ $event->title }}</h2>

        <div class="place-hour">
            <p class="city"> {{ $event->city }} </p>
            <p>&middot;</p>
            <p> starts at {{ $event->date->format('H:i') }} </p>
        </div>

        <p class="attenders"> {{ $event->attenders->count()}} participants</p>

        <p> Posted by: {{ $event->author->username }}, <em>{{ $event->created_at->diffforHumans() }}</em> </p>


    </div>
</div>