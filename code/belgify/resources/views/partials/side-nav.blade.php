<div class="side-nav">
    <div class="dashboard-nav-header">
        <div class="profile-img-wrapper">
            @if( Auth::user()->avatar )

                <img class="dashboard-profile-img" src="{{ route('getImage', [Auth::user()->avatar->filename, 'small']) }}" alt="{{  Auth::user()->avatar->name }}" width="50">

            @else

                <img class="dashboard-profile-img" src="{{ url('/img/Profile_Dummy1.png') }}" alt="profile dummy">

            @endif
        </div>

        <h2>{{ Auth::user()->username }}</h2>

    </div>

    <div class="dashboard-nav-menu">
        <ul>
            <li>
                <a href="{{ route('dashboard') }}" class="{{ Request::is('dashboard') ? 'active' : ''}}">
                    <img src="{{ url('img/Follow_pic.png') }}" alt="pictogram Follow"/>
                    <p>Follow</p>
                </a>
            </li>
            <li>
                <a href="{{ route('my-events') }}" class="{{ Request::is('dashboard/my-events') ? 'active' : ''}}">
                    <img src="{{ url('img/Tours_pic.png') }}" alt="pictogram Tours"/>
                    <p>My Events</p>
                </a>
            </li>
            <li>
                <a href="{{ route('my-questions') }}" class="{{ Request::is('dashboard/my-questions') ? 'active' : ''}}">
                    <img src="{{ url('img/Questions_pic.png') }}" alt="pictogram Questions"/>
                    <p>Questions</p>
                </a>
            </li>
        </ul>
    </div>
</div>