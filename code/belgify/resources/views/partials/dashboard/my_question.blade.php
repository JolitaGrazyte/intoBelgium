

        <div>Question: <em>{{ $question->title }}</em></div>

        <div> Tags: @foreach( $question->tags as $tag )

                {{ $tag->name }}

            @endforeach

        </div>

        <div> Answers: @foreach( $question->comments as $comment )

                <p><a href="">{{ $comment->body }}</a></p>

            @endforeach

        </div>
