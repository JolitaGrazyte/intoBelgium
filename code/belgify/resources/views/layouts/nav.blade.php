<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ route('home') }}">intoB</a>
        </div>

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li><a href="{{ route('home') }}">Home</a></li>
                <li><a href="{{ route('posts.index') }}">Questions</a></li>
                <li><a href="{{ route('events.index') }}">Events</a></li>

            </ul>

            <ul class="nav navbar-nav navbar-right">

                @if ( Auth::guest() )
                    <li>
                        {!!Form::open(['route' => 'postLogin', 'class' => 'form-horizontal', 'role' => 'form'])  !!}


                        <div class="col-md-4">

                            {!! Form::email('email', old('email'), ['class' => 'form-control', 'placeholder' => 'email']) !!}

                        </div>

                        <div class="col-md-4">

                            {!! Form::password('password', ['class' => 'form-control',  'placeholder' => 'password']) !!}

                        </div>

                        <div class="col-md-4">

                            {!! Form::submit('Login', ['class' => 'btn btn-primary']) !!}

                        </div>

                        {!! Form::close() !!}
                    </li>


                    {{--<li><a href="{{ url('/auth/login') }}">Login</a></li>--}}
                    <li><a href="{{ url('/auth/register') }}">Register</a></li>
                @else

                    <li><a href="{{ route('dashboard') }}">Dashboard</a></li>

                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ Auth::user()->username }} <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="{{ route('profile.show', Auth::user()->id ) }}">My profile</a></li>
                            <li><a href="{{ url('/auth/logout') }}">Logout</a></li>
                        </ul>
                    </li>

                @endif
            </ul>
        </div>
    </div>
</nav>