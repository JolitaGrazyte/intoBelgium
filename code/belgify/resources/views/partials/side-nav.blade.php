<div class="sidebar">


   <div class="header">
       @if( Auth::user()->avatar )

           <img class="avatars sidebar-avatar" src="{{ route('getImage', [Auth::user()->avatar->filename, 'small']) }}" alt="{{  Auth::user()->avatar->name }}" width="110">

       @endif

           <h2>{{ Auth::user()->username }}</h2>
   </div>

    <ul>
        <li><a href="{{ route('dashboard') }}">     Follow      </a></li>
        <li><a href="{{ route('my-events') }}">     My Tours    </a></li>
        <li><a href="{{ route('my-questions') }}">  Questions   </a></li>
    </ul>
</div>