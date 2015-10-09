<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ route('pages', 'home') }}">Wally's Groove World</a>
        </div>

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li><a href="{{ route('pages', 'home') }}">Home</a></li>
                <li class="dropdown">
                    <a href="" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Vinyl <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">

                        <!-- Todo: CATALOG -->
                        <li><a href="{{ route('pages', 'products') }}">New Vinyl</a></li>
                        <li><a href="{{ route('pages', 'products') }}">Second Hand Vinyl</a></li>
                        <li><a href="{{ route('pages', 'products') }}">Collectors Vinyl</a></li>

                    </ul>
                </li>
                <li><a href="">CD</a></li>
                <li><a href="">Cassette</a></li>

                <li id="search" class="">
                    {!! Form::open(['route' => 'search.index']) !!}
                    {!! Form::text('keyword', null, ['placeholder' => 'Search',  'class' => 'search-input']) !!}
                    {!! Form::submit('search',['class'=>'btn-search btn']) !!}
                    <span class="icon-search-vis"></span>
                    {!! Form::close() !!}

                </li>
            </ul>

            <ul class="nav navbar-nav navbar-right">
                @if (Auth::guest())
                    <li><a href="{{ url('/auth/login') }}">Login</a></li>
                    <li><a href="{{ url('/auth/register') }}">Register</a></li>
                @else

                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ Auth::user()->username }} <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="{{ url('/auth/logout') }}">Logout</a></li>
                        </ul>
                    </li>

                @endif
            </ul>
        </div>
    </div>
</nav>