<div class="row d-event">
    <div class="col-md-2 background">
        @if ($auth && $auth->isAuthor($event->author))

            <a class="y-more-info" href="{{ route('events.show', $event['id']) }}">
                <div class="wrapper">
                    <img src="{{ url('img/More_info.png') }}" alt="more info icon"/>
                </div>
            </a>
            <a class="y-edit" href="{{ route('events.edit', $event['id']) }}">
                <div class="wrapper">
                    <img src="{{ url('img/Edit.png') }}" alt="Edit icon"/>
                </div>
            </a>
            <a class="y-delete" href="{{ route('events.index' ) }}">
                <div class="wrapper">
                    <img src="{{ url('img/Delete.png') }}" alt="Delete icon"/>
                </div>
            </a>

        @else

            <a href="{{ route('events.show', $event['id']) }}">
                <div class="wrapper">
                    <img src="{{ url('img/More_info.png') }}" alt="more info icon"/>
                    <p>Details</p>
                </div>
            </a>

        @endif
    </div>

    <div class="col-md-2 d-event-dates">
            <div class="day">{{ $event->date->day }}</div>
            <div class="month">{{ $event->date->format('F') }}</div>
            <div class="year">{{ $event->date->year }}</div>

    </div>

    <div class="col-md-8 d-event-detail">

            <a class="title" href="{{ route('events.show', $event['id']) }}"> {{ $event->title }}</a>

            <div class="place-hour">
                <p class="city"> {{ $event->location->name }} </p>
                <p>&middot;</p>
                <p> starts at {{ $event->date->format('H:i') }} </p>
            </div>

            <p class="attenders"> {{ $event->attenders->count()}} participants</p>

            <p> Posted by: <a href="{{ route('profile.show', str_replace(' ', '-', $event->author->username ) ) }}">{{ $event->author->username }}</a>, <em>{{ $event->created_at->diffforHumans() }}</em> </p>

    </div>

    @if ($auth && $auth->isAuthor($event->author))
        <a href="{{ route('profile.show', str_replace(' ', '-', $event->author->username ))  }}">
            <div class="img-wrapper">
                @if( Auth::user()->avatar )

                    <img src="{{ route('getImage', [$user->avatar->filename, 'small']) }}" alt="{{  Auth::user()->avatar->name }}" width="50">

                @else

                    <img class="events-profile-img" src="{{ url('/img/Profile_Dummy.png') }}" alt="profile dummy">

                @endif

                <p>your event</p>
            </div>
        </a>
    @endif


</div>
