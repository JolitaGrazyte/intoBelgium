@if(count($my_questions))

    <h2>My questions</h2>

    @foreach($my_questions as $question)

        <div>Question: {{ $question }} </div>

        <div> Tags: @foreach( $question->tags as $tag )

                {{ $tag->name }}

            @endforeach

        </div>

        <div> Answers: @foreach( $question->comments as $comment )

                <p><a href="">{{ $comment->body }}</a></p>

            @endforeach

        </div>

    @endforeach

@endif