<div class="col-md-2">
    <hr>

    <div class="col-md-6">
        <div> {{ $post->comments->count() }}</div>
        <div>

            @if(Request::is('posts'))
                <a href="{{route('posts.show', $post->id) }}">answers </a>
            @else
                answers
            @endif
        </div>
    </div>

    <div class="col-md-6">
        <div>{{ $post->votes->count() }}</div>
        <div>votes</div>
    </div>

</div>

<div class="col-md-10">

    <hr>

    <div>

        <h4><a href="{{route('posts.show', $post->id)}}"> {{ $post->title }} </a></h4>
        <p>posted by:
            <a href="{{ route('profile.show', str_replace(' ', '-', $post->author->username) ) }}">
                {{ $post->author->username }}
            </a>
            <em>, {{ $post->created_at->diffforHumans() }} </em></p>
        <p> {{ Request::is('posts') ? $post->body : substr($post->body, 0, 100) }}</p>

    </div>


    @if(!Auth::guest())

        <div class="row">

            @if($auth->isLocal() && !$auth->isAuthor($post->author))

                <div class="col-md-2"><a href="{{ route('comments.create') }}" class="btn btn-link"> {{ !count($post->comments) ? 'be the first!! ' : '' }} answer this question</a></div>

            @elseif($auth->isAuthor($post->author))

                <div class="col-md-2"><a href="{{ route('posts.edit', $post->id) }}" class="btn btn-link">update this question</a></div>

                <div class="col-md-2">

                    {!!Form::open(['route' => ['posts.destroy', $post->id], 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'DELETE'])  !!}

                    <div class="form-group">

                        <div class="col-md-12">

                            {!! Form::submit('delete', ['class' => 'btn btn-link']) !!}

                        </div>

                    </div>

                    {!!Form::close() !!}

                </div>

            @endif

        </div>

    @endif


    <div>
        @if(Request::is('posts/*') && count($post->comments))

            <ul>

                @each('partials.answers', $post->comments, 'comment')

            </ul>

        @endif
    </div>

    <div>
        <ul>

            <a href="">@each('partials.tags', $post->tags, 'tag' )</a>

        </ul>

    </div>

</div>


