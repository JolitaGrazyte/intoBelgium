<div class="dashboard-nav-header">
    <div class="profile-img-wrapper">
        @if( Auth::user()->avatar )

            <img src="{{ route('getImage', [Auth::user()->avatar->filename, 'small']) }}" alt="{{  Auth::user()->avatar->name }}" width="50">

        @else

            <img class="dashboard-profile-img" src="/img/Profile_Dummy.png" alt="profile dummy">

        @endif
    </div>

    <h2>{{ Auth::user()->username }}</h2>

</div>

<div class="dashboard-nav-menu">
    <ul>
        <li>
            <a href="{{ route('dashboard') }}" class="active">
                <img src="/img/Follow_pic.png" alt="pictogram Follow"/>
                <p>Follow</p>
            </a>
        </li>
        <li>
            <a href="{{ route('my-events') }}">
                <img src="/img/Tours_pic.png" alt="pictogram Tours"/>
                <p>My Tours  </p>
            </a>
        </li>
        <li>
            <a href="{{ route('my-questions') }}">
                <img src="/img/Questions_pic.png" alt="pictogram Questions"/>
                <p>Questions</p>
            </a>
        </li>
    </ul>
</div>