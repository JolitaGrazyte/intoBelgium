<div class="row search">
<div class="col-md-4">
    <div class="col-md-6 answers">
        <div class="number"> {{ $result["comments"]->count() }}</div>
        <div>

            @if(Request::is('posts'))
                <a href="{{route('posts.show', $post->id) }}">{{  $result["comments"]->count() == 1 ? 'answer' : 'answers' }} </a>
            @else
                {{  $result["comments"]->count() == 1 ? 'answer' : 'answers' }}
            @endif
        </div>
    </div>

    <div class="col-md-6 votes">
        <div class="number">{{ $result["votes"]->count() }}</div>
        <div>{{ $result["votes"]->count() == 1 ?'vote':'votes'}}</div>
    </div>
</div>

<div class="col-md-8 search-result-posts">

    <a href="{{ route( 'posts.show', $result['id']) }}"><h3> {{ $result['title'] }} </h3></a>

    <p> {{ $result['author']->username }}</p>



</div>
</div>