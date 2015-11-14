<div class="row single-answer">

    <div class="col-md-2">

        <div class="img-wrapper">

            @if( count($com->author->avatar) )

                <img class="events-profile-img" src="{{ route('getImage', [$com->author->avatar->filename, 'small']) }}" alt="{{  $com->author->avatar->filename }}" width="50">

            @else

                <img class="events-profile-img" src="{{ url('/img/Profile_Dummy1.png') }}" alt="profile dummy">

            @endif

            {{--<a href="{{ route('profile.show', str_replace(' ', '-', $com->author->username ) ) }}">{{ $com->author->username }}</a>--}}

            @if(!Auth::check())

                <a href="{{ url('/auth/login .content' ) }}" data-url="{{route('profile.show' , str_replace(' ', '-', $com->author->username ))}}" data-toggle="modal" data-target="#myModal">{{ $com->author->username }}</a>

            @else

                <a href="{{ route('profile.show', str_replace(' ', '-', $com->author->username ) ) }}">{{ $com->author->username }}</a>

            @endif

        </div>

    </div>

    <div class="col-md-10">
        <div>
            <p class="answer-body">{{ $com->body }}</p>
        </div>
    </div>

    <div class="row">

        @if(Auth::check())

            @if($auth->isAuthor($com->author))

                <a href="{{ route('comments.edit', $com->id) }}">update</a>
                <a href="{{ route('comments.destroy', $com->id) }}">delete</a>

            @else

                <div class="pull-right">
                    {!! Form::open(['route' =>  ['postVote'], 'class' => '', 'role' => 'form']) !!}
                    {!! Form::hidden('comment_id', $com->id) !!}
                    {!! Form::submit('Place your vote !!!', ['class' => 'btn']) !!}
                    {!! Form::close() !!}
                </div>

            @endif

        @endif

    </div>

</div>
