<div class="row d-post">

    <div class="col-md-2 background">
        @if ($auth && $auth->isAuthor($post->author))

            <a class="y-more-info" href="{{ route('posts.show', $post['id']) }}">
                <div class="wrapper">
                    <img src="{{ url('img/More_info.png') }}" alt="more info icon"/>
                </div>
            </a>
            <a class="y-edit" href="{{ url('/posts/' . $post['id'] . '/edit' . ' .post-form') }}" data-url="{{ url('/posts') }}" data-toggle="modal" data-target="#myModal">
                <div class="wrapper">
                    <img src="{{ url('img/Edit.png') }}" alt="Edit icon"/>
                </div>
            </a>
            <a class="y-delete" href="{{ route('post-delete-confirm',  $post->id) }}">
                <div class="wrapper">
                    <img src="{{ url('img/Delete.png') }}" alt="Delete icon"/>
                </div>
            </a>

        @else

            <a href="{{ route('posts.show', $post['id']) }}">
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
                    <a href="{{route('posts.show', $post->id) }}">{{  $post->comments->count() == 1 ? 'answer' : 'answers' }} </a>
                @else
                    {{  $post->comments->count() == 1 ? 'answer' : 'answers' }}
                @endif
            </div>
        </div>

        <div class="col-md-6 votes">
            <div class="number">{{ $post->votes->count() }}</div>
            <div>{{ $post->votes->count() == 1 ?'vote':'votes'}}</div>
        </div>

    </div>

    <div class="col-md-8 d-post-details">

        <a class="title" href="{{ route('posts.show', $post->id) }}"> {{ $post->title }} </a>

        <div>
            @each('partials.tags', $post->tags, 'tag')
        </div>

        {{--@include('partials.tags')--}}

        @if(!Auth::check())
            <p> Posted by: <a href="{{ url('/auth/login .content' ) }}" data-url="{{route('profile.show' , str_replace(' ', '-', $post->author->username ))}}" data-toggle="modal" data-target="#myModal">{{ $post->author->username }}</a>, <em>{{ $post->created_at->diffforHumans() }}</em> </p>
        @else
            <p> Posted by: <a href="{{ route('profile.show' , str_replace(' ', '-', $post->author->username ))}}">{{ $post->author->username }}</a>, <em>{{ $post->created_at->diffforHumans() }}</em> </p>

        @endif
    </div>

    @if ($auth && $auth->isAuthor($post->author))

        <a href="{{ route('profile.show', str_replace(' ', '-', $post->author->username ))  }}">

            <div class="img-wrapper">

                @if( $auth->avatar )

                    <img class="posts-profile-img" src="{{ route('getImage', [$auth->avatar->filename, 'small']) }}" alt="{{  $auth->avatar->name }}" width="50">

                @else

                    <img class="posts-profile-img" src="{{ url('/img/Profile_Dummy1.png') }}" alt="profile dummy">

                @endif

                <p>your question</p>
            </div>
        </a>
    @endif

</div>


