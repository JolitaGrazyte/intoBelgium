<div class="col-md-12 search-result">

    <a href="{{ route( 'events.show', $result['id']) }}"><h3> {{ $result['title'] }} </h3></a>
    <p> {{ $result['date']->format('j F Y, H:i') }}</p>

</div>