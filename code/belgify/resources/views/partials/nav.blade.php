<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ route('home') }}">
                <img class="logo" src="/img/Logo.png" alt="Logo Into Belgium"/>
            </a>
        </div>

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li><a href="{{ route('home') }}">Into Belgium</a></li>
                @if(!Request::is('/') )
                    <li><a href="{{ route('posts.index') }}">Questions</a></li>
                    <li><a href="{{ route('events.index') }}">Tours</a></li>
                @endif
            </ul>

            <ul class="nav navbar-nav navbar-right">

                @if ( Auth::guest() )

                    <li><a href="{{ url('/auth/login') }}">Login</a></li>
                    <li><a href="{{ url('/auth/register') }}">Register</a></li>
                @else

                    <li><a href="{{ route('dashboard') }}">Dashboard</a></li>

                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ Auth::user()->username }} <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="{{ route('profile.show', Auth::user()->username ) }}">My profile</a></li>
                            <li><a href="{{ url('/auth/logout') }}">Logout</a></li>
                        </ul>
                    </li>

                    <li>
                        @if( Auth::user()->avatar )

                            <img class="avatars" src="{{ route('getImage', [Auth::user()->avatar->filename, 'x-small']) }}" alt="{{  Auth::user()->avatar->name }}" width="40">

                        @endif
                    </li>

                @endif
            </ul>
        </div>
    </div>
</nav>