
<h2> {{ $event->title }}</h2>
<p> {{ $event->description }} </p>

<p> Posted by: {{ $event->author->username }}, <em>{{ $event->created_at->diffforHumans() }}</em> </p>

@if(count($event->tags))

    <div> Tags:

        @foreach($event->tags as $tag)

            {{$tag->name}}

        @endforeach

    </div>

@endif