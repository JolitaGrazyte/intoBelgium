<div class="row d-post">

    <div class="col-md-2 background">
        @if ($auth && $auth->isAuthor($post->author))

            <a class="y-more-info" href="{{ route('posts.show', $post['id']) }}">
                <div class="wrapper">
                    <img src="{{ url('img/More_info.png') }}" alt="more info icon"/>
                </div>
            </a>
            <a class="y-edit" href="{{ route('posts.edit', $post['id']) }}">
                <div class="wrapper">
                    <img src="{{ url('img/Edit.png') }}" alt="Edit icon"/>
                </div>
            </a>
            <a class="y-delete" href="{{ route('posts.index' ) }}">
                <div class="wrapper">
                    <img src="{{ url('img/Delete.png') }}" alt="Delete icon"/>
                </div>
            </a>

        @else

            <a href="{{ route('events.show', $post['id']) }}">
                <div class="wrapper">
                    <img src="{{ url('img/More_info.png') }}" alt="more info icon"/>
                    <p>Details</p>
                </div>
            </a>

        @endif
    </div>

    <div class="col-md-2 answer-votes">
        <div class="col-md-6 answers">
            <div class="number"> {{ $post->comments->count() }}</div>
            <div>

                @if(Request::is('posts'))
                    <a href="{{route('posts.show', $post->id) }}">answers </a>
                @else
                    answers
                @endif
            </div>
        </div>

        <div class="col-md-6 votes">
            <div class="number">{{ $post->votes->count() }}</div>
            <div>votes</div>
        </div>

    </div>

    <div class="col-md-8 d-post-details">

        <a class="title" href="{{route('posts.show', $post->id)}}"> {{ $post->title }} </a>

        <div>
            @if(count($post->tags))

                @foreach( $post->tags as $tag )

                    <p class="tag">{{ $tag->name }}</p>

                @endforeach

            @endif

        </div>

        <p> Posted by: <a href="{{ route('profile.show', str_replace(' ', '-', $post->author->username ) ) }}">{{ $post->author->username }}</a>, <em>{{ $post->created_at->diffforHumans() }}</em> </p>
    </div>

    @if ($auth && $auth->isAuthor($post->author))
        <a href="{{ route('profile.show', str_replace(' ', '-', $post->author->username ))  }}">
            <div class="img-wrapper">
                @if( Auth::user()->avatar )

                    <img class="posts-profile-img" src="{{ route('getImage', [$user->avatar->filename, 'small']) }}" alt="{{  Auth::user()->avatar->name }}" width="50">

                @else

                    <img class="posts-profile-img" src="{{ url('/img/Profile_Dummy.png') }}" alt="profile dummy">

                @endif

                <p>your question</p>
            </div>
        </a>
    @endif

</div>


