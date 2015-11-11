<div class="row">

    <div class="col-md-3 {{ Request::is('events') ? 'events-dates' : '' }}">

        <hr>

        <div class="border-right">

            <div>{{ $event['d'] }}</div>
            <div>{{ $event['M'] }}</div>
            <div>{{ $event['Y'] }}</div>
        </div>

    </div>

    <div class="col-md-9">

        <hr>

        <div><a href="{{ route('events.show', $event['id']) }}">{{ $event['title'] }}</a></div>

        <div>
            <em>author:</em>

            <a href="{{ route('profile.show', str_replace(' ', '-', $event['author']) ) }}">
                {{ $event['author'] }}
            </a>
        </div>

        <div>

            {{ Request::is('events') ? substr($event['description'], 1, 100) : $event['description'] }}

        </div>

        <div><em>Location: </em>{{ $event['location'] }}</div>

        <div class="row">

            <div class="col-md-12">
                @if(!$event['isAuthor'])

                    {!!Form::open(['route' => ['attend', $event['id']], 'class' => 'form-horizontal', 'role' => 'form'])  !!}


                    <div class="form-group">

                        {!! Form::hidden('going', $event['attending'], ['class' => '', 'onchange' => 'this.form.submit())']) !!}

                        {!! Form::submit(($event['attending'])?'Attending':'Attend', ['class' => $event['attending']? 'btn' : 'btn  btn-primary btn-attend']) !!}

                    </div>

                    {!!Form::close() !!}

                @endif
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                @if(count($event['tags']))

                    <ul>
                        @foreach($event['tags'] as $tag)

                            <li><a href="">{{ $tag->name }}</a></li>

                        @endforeach
                    </ul>
                @endif
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">

                @if(count($event['attenders']))

                    {{ $event['attenders'] == 1 ? $event['attenders']. ' person is attending this event.' : $event['attenders'].' people are attending this event.' }}

                @endif
            </div>
        </div>


        <div class="row">

            @if( $event['isAuthor'] )

                <a href="{{ route('events.edit', $event['id']) }}" class="col-md-2 col-lg-offset-6 btn btn-link">update this event</a>

                {!!Form::open(['route' => ['events.destroy', $event['id']], 'class' => 'form-horizontal col-md-2', 'id'=>$event['id'], 'role' => 'form', 'method' => 'DELETE'])  !!}


                {!! Form::submit('delete', ['class' => 'btn btn-link']) !!}


                {!!Form::close() !!}


            @endif

        </div>


        @if(Request::is('events/*') && !$auth->isAuthor($event->author))

            {!!Form::open(['route' => ['attend', $event->id], 'class' => 'form-horizontal', 'role' => 'form'])  !!}


            <div class="form-group">

                {!! Form::submit(($isAttending)?'Attending':'Attend', ['class' => $isAttending? 'btn' : 'btn  btn-primary btn-attend']) !!}

            </div>

            {!!Form::close() !!}

        @endif

    </div>

</div>




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
                @if( $auth->avatar )

                    <img src="{{ route('getImage', [$auth->avatar->filename, 'small']) }}" alt="{{  $auth->avatar->name }}" width="50">

                @else

                    <img class="events-profile-img" src="{{ url('/img/Profile_Dummy.png') }}" alt="profile dummy">

                @endif

                <p>your event</p>
            </div>
        </a>
    @endif


</div>
