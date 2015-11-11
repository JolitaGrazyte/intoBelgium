<div class="d-post">

    <div class="row header">
        <div class="col-md-2">
            <div class="img-wrapper">
                @if( $post->author->avatar )

                    <img class="events-profile-img" src="{{ route('getImage', [$post->author->avatar->filename, 'small']) }}" alt="{{ $post->author->avatar->name }}" width="50">

                @else

                    <img class="events-profile-img" src="{{ url('/img/Profile_Dummy1.png') }}" alt="profile dummy">

                @endif

                <a class="i-name" href="{{ route('profile.show', str_replace(' ', '-', $post->author->username ) ) }}">{{ $post->author->username }}</a>
            </div>
        </div>
        <div class="col-md-8">

            <div>

                <h4 class="title">{{ $post->title }}</h4>
                <p class="posted">Asked {{ $post->created_at->diffforHumans() }}</p>
                <p class="body-question"> {{ Request::is('posts') ? $post->body : substr($post->body, 0, 100) }}</p>
                @if(count($post->tags))

                    @foreach( $post->tags as $tag )

                        <p class="tag">{{ $tag->name }}</p>

                    @endforeach

                @endif
            </div>
        </div>
        <div class="col-md-2 d-votes">
                <p class="v">{{ $post->votes->count() }}</p>
                <p>votes</p>
        </div>
    </div>

    <div class="row answer-wrapper">
            <div class="col-md-2 line-wrapper">
                <div class="line"></div>
            </div>
            <div class="col-md-10 answers-wrapper">
                @if($post->comments->count())

                    @foreach($post->comments as $com)

                        <div class="row single-answer">
                            <div class="col-md-2">
                                <div class="img-wrapper">
                                    @if( count($com->author->avatar) )

                                        <img class="events-profile-img" src="{{ route('getImage', [$com->author->avatar->filename, 'small']) }}" alt="{{  $com->author->avatar->filename }}" width="50">

                                    @else

                                        <img class="events-profile-img" src="{{ url('/img/Profile_Dummy1.png') }}" alt="profile dummy">

                                    @endif


                                        <a href="{{ route('profile.show', str_replace(' ', '-', $com->author->username ) ) }}">{{ $com->author->username }}</a>

                                </div>

                                </div>
                            <div class="col-md-10">
                                <div>
                                    <p class="answer-body">{{ $com->body }}</p>
                                </div>
                            </div>

                            <div class="row">
                            @if($auth->isAuthor($com->author))

                                    <a href="{{ route('comments.edit', $com->id) }}">update</a>
                                    <a href="{{ route('comments.destroy', $com->id) }}">delete</a>

                            @else

                                {{-- TODO: voting implementeren  --}}

                                    <a href="">VOTE !!!!</a>

                            @endif
                            </div>

                        </div>
                        @endforeach

                @else


                    <div class="row single-answer">
                        <div class="col-md-12">
                            <h1 class="no-answers">No Answers</h1>
                        </div>
                    </div>

                @endif

                <div class="row answer-btn single-answer">
                    {{--<div class="col-md-12"><a href="{{ route('comments.create') }}" class="btn btn-link"> {{ !count($post->comments) ? 'Be the first!! ' : '' }} answer this question</a></div>--}}
                    <div class="col-md-12">
                        <a href="{{ route('answer', $post->id) }}" class="btn btn-link">
                            {{ !count($post->comments) ? 'Be the first!! ' : '' }} answer this question
                        </a>
                    </div>
                </div>


            </div>

    </div>

</div>
