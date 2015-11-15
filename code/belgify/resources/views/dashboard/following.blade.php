{{--{{dd($follwd)}}--}}

@if(!is_null($follwd['last']))

    <a href="{{ route('profile.show', str_replace(' ', '-', $follwd['person']->username) ) }}"><div class="col-md-12 following">
            <div class="">

                <div class="date">
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
                <div class="followed-username"><span class="username">{{ $follwd['person']->username }}</span>

                        @if($follwd['last']['table'] == 'events')

                            @if($follwd['person']['id'] == $follwd['last']['user_id'])

                            <em> posted a tour:</em>

                            @else

                                <em>joined a tour:</em>

                            @endif

                            @elseif($follwd['last']['table'] == 'posts')

                            <em> asked a question:</em>

                            @else

                            <em> answered a question:</em>

                        @endif

                </div>

                <h3 class="body">"{{ $follwd['last']['table'] == 'comments' ? $follwd['last']->post->title :$follwd['last']['title'] }}"</h3>

            </div>
        </div>

    </a>

@endif