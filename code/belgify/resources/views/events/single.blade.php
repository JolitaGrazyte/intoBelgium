<div class="row d-event">
    <div class="col-md-2 background">

        <a href="{{ route('events.show', $event['id']) }}">
            <div class="wrapper">
                <img src="{{ url('/img/More_info.png') }}" alt="more info icon"/>
                <p>Details</p>
            </div>
        </a>
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

        {{--{{ dd(count($event->author->avatar)) }}--}}
        <p> Posted by: <a href="{{ route('profile.show', str_replace(' ', '-', $event->author->username ) ) }}">{{ $event->author->username }}</a>, <em>{{ $event->created_at->diffforHumans() }}</em> </p>


        {{--ATTEND BTN--}}

        {{--@if(Request::is('events/*') && !$auth->isAuthor($event->author))--}}

            {{--{!!Form::open(['route' => ['attend', $event->id], 'class' => 'form-horizontal', 'role' => 'form'])  !!}--}}


            {{--<div class="form-group">--}}

                {{--{!! Form::hidden('going', $event['attending'], ['class' => '', 'onchange' => 'this.form.submit())']) !!}--}}

                {{--{!! Form::submit(($isAttending)?'Going':'Check in', ['class' => $isAttending? 'btn' : 'btn  btn-primary btn-attend']) !!}--}}

            {{--</div>--}}

            {{--{!!Form::close() !!}--}}

        {{--@endif--}}
    </div>
</div>
