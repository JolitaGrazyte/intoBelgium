@include('partials.message')

@include('partials.errors')

@if (Session::has('confirmDelete'))

    <div class="alert alert-danger alert-important">

        <button type="button" class="close" data-dismiss="alert" aria-hideen="true">&times;</button>
        {{ session('confirmDelete') }}
        <a href="{{ route('event-delete') }}">Yes</a> || <a href="{{ route('events.index') }}">Cancel</a>
    </div>

@endif

<h1>{{ $title }}</h1>

@include('partials.search')