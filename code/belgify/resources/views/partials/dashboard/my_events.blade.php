{{--@if(count($my_events))--}}

    {{--<h2>My events</h2>--}}

    {{--@foreach($my_events as $event)--}}

        {{--<div> {{ $event }} </div>--}}

        {{--<div> Tags: @foreach($event->tags as $tag)--}}

                {{--{{$tag->name}}--}}

            {{--@endforeach--}}

        {{--</div>--}}

    {{--@endforeach--}}

{{--@endif--}}

@include('events.single',$my_events)