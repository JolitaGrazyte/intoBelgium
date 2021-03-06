<div class="row d-event">
    <div class="col-md-2 background">
        @if ($auth && $auth->isAuthor($event->author))

            <a class="y-more-info" href="{{ route('events.show', $event['id']) }}">
                <div class="wrapper">
                    <img src="{{ url('img/More_info.png') }}" alt="more info icon"/>
                </div>
            </a>
            <a class="y-edit" href="{{ url('/events/' .  $event['id']) . '/edit .post-form' }}" data-url="{{ url('/events/' . $event['id']) }}" data-toggle="modal" data-target="#myModal">
                <div class="wrapper">
                    <img src="{{ url('img/Edit.png') }}" alt="Edit icon"/>
                </div>
            </a>
            <a class="y-delete" href="{{ route('event-delete-confirm',  $event->id) }}">
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


        {{--TODO: TAGS style--}}
        <div>
            @each('partials.tags', $event->tags, 'tag')
        </div>


        <p class="attenders"> {{ $event->attenders->count()}} participants</p>

            @if(!Auth::check())
                <p> Posted by: <a href="{{ url('/auth/login .content' ) }}" data-url="{{route('profile.show' , str_replace(' ', '-', $event->author->username ))}}" data-toggle="modal" data-target="#myModal">{{ $event->author->username }}</a>, <em>{{ $event->created_at->diffforHumans() }}</em> </p>
            @else
                <p> Posted by: <a href="{{ route('profile.show', str_replace(' ', '-', $event->author->username ) ) }}">{{ $event->author->username }}</a>, <em>{{ $event->created_at->diffforHumans() }}</em> </p>
            @endif
    </div>

    @if ($auth && $auth->isAuthor($event->author))
        <a href="{{ route('profile.show', str_replace(' ', '-', $event->author->username ))  }}">
            <div class="img-wrapper">
                @if( $auth->avatar )

                    <img class="events-profile-img" src="{{ route('getImage', [$auth->avatar->filename, 'small']) }}" alt="{{  $auth->avatar->name }}" width="50">

                @else

                    <img class="events-profile-img" src="{{ url('/img/Profile_Dummy1.png') }}" alt="profile dummy">

                @endif

                <p>your event</p>
            </div>
        </a>
    @endif


</div>
