<div class="col-md-2">
    <hr>

    {{--<div><a href="{{ route('posts.show', $post->id) }}">Answers: </a> <span> {{ $post->comments->count() }}</span></div>--}}

    {{--<div>VOTES: <span>{{ $post->votes->count() }}</span></div>--}}

</div>

<div class="col-md-10">

    <hr>

    <div>

        {{--<h4><a href="{{route('posts.show', $post->id)}}"> {{ $post->title }} </a></h4>--}}
{{--        <p>posted by: {{ $post->author->first_name }} {{ $post->author->last_name }}</p>--}}
{{--        <p>    <em> {{ $post->created_at->diffforHumans() }} </em></p>--}}
        <p> {{ $search_result }}</p>

    </div>

    <div>
        {{--@if(count($post->tags))--}}
            {{--Tags:--}}
            {{--@foreach($post->tags as $tag)--}}

                {{--{{ $tag->name }}--}}

            {{--@endforeach--}}

        {{--@endif--}}
    </div>

</div>