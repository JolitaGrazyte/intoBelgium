

<div>Question: <em><a href="{{ route('posts.edit', $question->id) }}"> {{ $question->title }} </a></em></div>

<div>
    @if(count($question->tags))

        Tags:
        @foreach( $question->tags as $tag )

            {{ $tag->name }}

        @endforeach

    @endif

</div>

<div>

    @if(count($question->comments))

        <ul>
            Answers:
            @foreach( $question->comments as $comment )

                <li>
                    <a href="{{ route('comments.show', $comment->id) }}">{{ Request::is('dashboard/my-questions')?substr($comment->body, 0, 50):$comment->body }}</a>
                </li>

            @endforeach

        </ul>

    @endif

</div>


