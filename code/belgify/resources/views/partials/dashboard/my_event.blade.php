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
            <p class="city"> {{ $event->location->name }} </p>
            <p>&middot;</p>
            <p> starts at {{ $event->date->format('H:i') }} </p>
        </div>

        <p class="attenders"> {{ $event->attenders->count()}} participants</p>

        <p> Posted by: {{ $event->author->username }}, <em>{{ $event->created_at->diffforHumans() }}</em> </p>

        {!!Form::open(['route' => ['follow', $event->author->id], 'class' => 'form-horizontal', 'role' => 'form'])  !!}

        <div class="form-group">

            {{--TODO: Remove method to a better place--}}

            {!! Form::hidden('follow', Auth::user()->userIsFollowing(Auth::user()->id, $event->author->id)?0:1, ['class' => '', 'onchange' => 'this.form.submit())']) !!}

            {{-- TODO: WRITE CLASSES FOR BUTTONS --}}

            {!! Form::submit(Auth::user()->userIsFollowing(Auth::user()->id, $event->author->id)?'Following':'Follow', ['class' => !Auth::user()->userIsFollowing(Auth::user()->id, $event->author->id)?'btn-follow btn btn-primary':'btn btn-primary ']) !!}

        </div>

        {!!Form::close() !!}


    </div>
</div>