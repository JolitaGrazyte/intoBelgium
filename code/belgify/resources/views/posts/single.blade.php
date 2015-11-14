<div class="d-post">

    @include('posts.partials.header')

    <div class="row answer-wrapper">
        <div class="col-md-2 line-wrapper">
            <div class="line"></div>
        </div>

        <div class="col-md-10 answers-wrapper">

                @each('comments.single', $post->comments, 'com', 'comments.no-answers')

                @if(Auth::check() && !$auth->isAuthor($post->author))
                    <div class="row answer-btn single-answer">
                        <div class="col-md-12">
                            <a href="{{ route('answer', $post->id) }}" class="btn btn-link">
                                {{ !count($post->comments) ? 'Be the first!! ' : '' }} answer this question
                            </a>
                        </div>
                    </div>

                @elseif(Auth::guest())

                    <div class="row answer-btn single-answer">
                        <div class="col-md-12">
                            <a href="{{ url('/auth/login .content') }}" data-url="{{ route('answer', $post->id) }}" data-toggle="modal" data-target="#myModal" class="btn btn-link"> {{ !count($post->comments) ? 'Be the first!! ' : '' }} Login and answer this question</a></div>
                    </div>

                @endif

        </div>

    </div>

</div>
