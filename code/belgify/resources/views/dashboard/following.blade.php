@if(!is_null($follwd['last']))

    <a href="{{ route('profile.show', str_replace(' ', '-', $follwd['person']->username) ) }}"><div class="col-md-3 following">
            <div class="">

                <div>
                    {{ $follwd['last']['created_at']->format('d M Y') }}
                </div>

                @if(count($follwd['person']->avatar))

                    <img class="avatars followed-avatar" src="{{ route('getImage', [$follwd['person']->avatar->filename,  'small'] ) }}" alt="{{ $followed->avatar->name }}">
                @else

                    <img class="events-profile-img" src="{{ url('/img/Profile_Dummy1.png') }}" alt="profile dummy">

                @endif
            </div>

            <div>

                {{--<div class="followed-username"> {{ $followed->username }} </div>--}}
                <div class="followed-username">{{ $follwd['person']->username }}  <em>{{ $follwd['last']['table'] == 'events'?'joined a tour':' asked a question:' }}</em></div>

                <h3>{{ $follwd['last']['title'] }}</h3>

            </div>
        </div>

    </a>

@endif