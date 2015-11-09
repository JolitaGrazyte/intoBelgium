<div class="col-md-2">
    <hr>

    <div class="col-md-6">
        <div> {{ $post->comments->count() }}</div>
        <div><a href="{{ route('posts.show', $post->id) }}">answers </a> </div>
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

    <div>
        @if(count($post->tags))

            <ul>
            @foreach($post->tags as $tag)

                <li><a href="">{{ $tag->name }}</a></li>

            @endforeach

            </ul>

        @endif
    </div>

</div>


@if(!Auth::guest() && $auth->isLocal())

    <div class="row col-md-offset-2">

        @if( !Auth::user()->isAuthor($post->author) )

            <div class="col-md-2"><a href="{{ route('comments.create') }}" class="btn btn-link">answer this question</a></div>

        @else

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