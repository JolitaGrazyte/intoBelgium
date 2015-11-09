<div class="row">


    <div class="col-md-12">

        <div class="border-right">
            <div>{{ $event['d'] }}</div>
            <div>{{ $event['M'] }}</div>
            <div>{{ $event['Y'] }}</div>
        </div>

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
    </div>
</div>
