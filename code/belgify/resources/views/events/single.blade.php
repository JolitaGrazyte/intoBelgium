<div class="row d-event">

    <div class="col-md-2">
        <div class="event-dates">
            <div class="day">{{ $event->date->day }}</div>
            <div class="month">{{ $event->date->format('F') }}</div>
            <div class="year">{{ $event->date->year }}</div>
        </div>
    </div>

    <div class="col-md-10 event-detail">

        <h1 class="title">{{ $event->title }}</h1>

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
