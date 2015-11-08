<div class="row">
    <div class="col-md-2">
        <hr>
        {{--TODO: MOVE INLINE STYLES !!!--}}
        <div style="border-right: 1px solid #e3e3e3; min-height:13rem;">
            <div style="font-size: 5rem">{{ $event->date->format('d') }}</div>
            <div style="font-size: 2.5rem">{{ $event->date->format('M') }}</div>
            <div style="font-size: 2.5rem">{{ $event->date->format('Y') }}</div>
        </div>

    </div>

    <div class="col-md-10">

        <hr>

        <h2> {{ $event->title }}</h2>
        <em style="color: darkgray">{{ $event->created_at->toDayDateTimeString() }}</em>
        <p> {{ $event->description }} </p>

        {{--TODO: remove inline styles--}}

        <p style="color: darkgray"> Posted by: {{ $event->author->username }}, <em> {{ $event->created_at->diffforHumans() }}</em> </p>

        {!!Form::open(['route' => ['follow', $event->author->id], 'class' => 'form-horizontal', 'role' => 'form'])  !!}

        <div class="form-group">

            {{--TODO: Remove method to a better place--}}

            {!! Form::hidden('follow', Auth::user()->userIsFollowing(Auth::user()->id, $event->author->id)?0:1, ['class' => '', 'onchange' => 'this.form.submit())']) !!}

            {{-- TODO: WRITE CLASSES FOR BUTTONS --}}

            {!! Form::submit(Auth::user()->userIsFollowing(Auth::user()->id, $event->author->id)?'Following':'Follow', ['class' =>'btn btn-primary btn-follow']) !!}

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