
@if( Auth::user()->avatar )

    <img src="{{ route('getImage', [Auth::user()->avatar->filename, 'small']) }}" alt="{{  Auth::user()->avatar->name }}" width="50">

@endif

<h2>{{ Auth::user()->username }}</h2>

<ul>
    <li><a href="{{ route('dashboard') }}">     Follow      </a></li>
    <li><a href="{{ route('my-events') }}">     My Tours    </a></li>
    <li><a href="{{ route('my-questions') }}">  Questions   </a></li>
</ul>