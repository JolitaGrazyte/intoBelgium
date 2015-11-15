@include('partials.message')

<div class="row header">

    <div class="col-md-2">

        <div class="img-wrapper">

            @if( $post->author->avatar )

                <img class="events-profile-img"

                     src="{{ route('getImage', [$post->author->avatar->filename, 'small']) }}"
                     alt="{{ $post->author->avatar->name }}"
                     width="50">

            @else

                <img class="events-profile-img" src="{{ url('/img/Profile_Dummy1.png') }}" alt="profile dummy">

            @endif


            @if(!Auth::check())
                <a class="i-name"  href="{{ url('/auth/login .content' ) }}" data-url="{{route('profile.show' , str_replace(' ', '-', $post->author->username ))}}" data-toggle="modal" data-target="#myModal">{{ $post->author->username }}</a>
            @else
                <a class="i-name" href="{{ route('profile.show', str_replace(' ', '-', $post->author->username ) ) }}">{{ $post->author->username }}</a>
            @endif

        </div>

    </div>

    <div class="col-md-8">

        <div>

            <h4 class="title">{{ $post->title }}</h4>
            <p class="posted">Asked {{ $post->created_at->diffforHumans() }}</p>
            <p class="body-question"> {{ Request::is('posts') ? $post->body : substr($post->body, 0, 100) }}</p>

            <div>
                @each('partials.tags', $post->tags, 'tag')
            </div>


        </div>

    </div>

    <div class="col-md-2 d-votes">
        <p class="v">{{ $post->votes->count() }}</p>
        <p>{{ $post->votes->count() == 1 ?'vote':'votes'}}</p>

        <div class="">
            {!! Form::open(['route' =>  ['post-vote'], 'class' => '', 'role' => 'form']) !!}
            {!! Form::hidden('voteable_id', $post->id) !!}
            {!! Form::submit('Place your vote', ['class' => 'btn btn-vote']) !!}
            {!! Form::close() !!}
        </div>
    </div>



</div>