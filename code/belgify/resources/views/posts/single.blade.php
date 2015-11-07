<div class="col-md-2">

    <div><a href="{{ route('posts.show', $post->id) }}">Answers: </a> <span> {{ $post->comments->count() }}</span></div>

    <div>VOTES: <span>{{ $post->votes->count() }}</span></div>

</div>

<div class="col-md-10">

    <div>

        <h4><a href="{{route('posts.show', $post->id)}}"> {{ $post->title }} </a></h4>
        <p>posted by: {{ $post->author->first_name }} {{ $post->author->last_name }}</p>
        <p>    <em> {{ $post->created_at->diffforHumans() }} </em></p>
        <p> {{ $post->body }}</p>

    </div>

    <div>
        @if(count($post->tags))
            Tags:
            @foreach($post->tags as $tag)

                {{ $tag->name }}

            @endforeach

        @endif
    </div>

</div>


@if(!Auth::guest())

    @if( Auth::user()->id == $post->user_id )

        <div class="row col-md-offset-2">

            <div class="col-md-2"><a href="{{ route('comments.create') }}" class="btn btn-link">answer this question</a></div>

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

        </div>

    @endif

@endif