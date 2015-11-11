<div class="row d-post">

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

    <div class="col-md-10 d-post-details">

        <a class="title" href="{{route('posts.show', $post->id)}}"> {{ $post->title }} </a>

        <div>
            @if(count($post->tags))

                @foreach( $post->tags as $tag )

                    <p class="tag">{{ $tag->name }}</p>

                @endforeach

            @endif

        </div>

        <p> Posted by: <a href="{{ route('profile.show', str_replace(' ', '-', $post->author->username ) ) }}">{{ $post->author->username }}</a>, <em>{{ $post->created_at->diffforHumans() }}</em> </p>    </div>

</div>


