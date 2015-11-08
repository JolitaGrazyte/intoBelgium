<div class="row">
    <div class="col-md-3 events-dates">
        <hr>

        <div class="border-right">

            <div>{{ $event->date->format('d') }}</div>
            <div>{{ $event->date->format('M') }}</div>
            <div>{{ $event->date->format('Y') }}</div>

        </div>

    </div>

    <div class="col-md-9">

        <hr>

        <h2> {{ $event->title }}</h2>

        {{--TODO: remove inline styles--}}
        <em style="color: darkgray">{{ $event->created_at->toDayDateTimeString() }}</em>
        <p> {{ $event->description }} </p>

        {{--TODO: remove inline styles--}}

        <p style="color: darkgray"> Posted by: {{ $event->author->username }}, <em> {{ $event->created_at->diffforHumans() }}</em> </p>

        {!!Form::open(['route' => ['follow', $event->author->id], 'class' => 'form-horizontal', 'role' => 'form'])  !!}

        <div class="form-group">

            {{--TODO: Remove method to a better place--}}

            {!! Form::hidden('follow', Auth::user()->userIsFollowing(Auth::user()->id, $event->author->id)?0:1, ['class' => '', 'onchange' => 'this.form.submit())']) !!}

            {!! Form::submit(Auth::user()->userIsFollowing(Auth::user()->id, $event->author->id)?'Following':'Follow', ['class' => !Auth::user()->userIsFollowing(Auth::user()->id, $event->author->id)?'btn-follow btn btn-primary':'btn btn-primary ']) !!}

        </div>

        {!!Form::close() !!}

        @if(count($event->tags))

            <div> Tags:

                @foreach($event->tags as $tag)

                    {{$tag->name}}

                @endforeach

            </div>

        @endif

    </div>

</div>