<div class="col-md-2">
    <hr>
    {{--TODO: MOVE INLINE STYLES !!!--}}
    <div style="border-right: 1px solid #e3e3e3; min-height:13rem;">
        <div>{{ $event['d'] }}</div>
        <div>{{ $event['fM'] }}</div>
        <div>{{ $event['Y'] }}</div>
    </div>

</div>

<div class="col-md-10">

    <hr>

    <div><a href="{{ route('events.show', $event['id']) }}">{{ $event['title'] }}</a></div>

    <div><em>author: </em>{{ $event['author'] }}</div>

    <div>{{ $event['description'] }}</div>

    <div><em>Location: </em>{{ $event['location'] }}</div>

    <div class="col-md-12">
        @if(!$event['isAuthor'])

            {!!Form::open(['route' => ['attend', $event['id']], 'class' => 'form-horizontal', 'role' => 'form'])  !!}


            <div class="form-group">

                {!! Form::hidden('going', $event['attending'], ['class' => '', 'onchange' => 'this.form.submit())']) !!}

                {{-- TODO: WRITE CLASSES FOR BUTTONS --}}

                {!! Form::submit(($event['attending'])?'Attending':'Attend', ['class' => $event['attending']? 'btn' : 'btn  btn-primary btn-search']) !!}

            </div>

            {!!Form::close() !!}

        @endif
    </div>

    <div class="col-md-12">

        {{ $event['attenders'] }} people attending this event.
    </div>


    @if( $event['isAuthor'] )

        <a href="{{ route('events.edit', $event['id']) }}" class="col-md-2 col-lg-offset-6 btn btn-link">update this event</a>

        {!!Form::open(['route' => ['events.destroy', $event['id']], 'class' => 'form-horizontal col-md-2', 'id'=>$event['id'], 'role' => 'form', 'method' => 'DELETE'])  !!}


        {!! Form::submit('YES', ['class' => 'btn btn-link']) !!}


        {!!Form::close() !!}


    @endif

</div>