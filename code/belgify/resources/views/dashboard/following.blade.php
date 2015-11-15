<a href="{{ route('profile.show', str_replace(' ', '-', $followed->username) ) }}"><div class="col-md-3 following">
    <div class="">
        @if(count($followed->avatar))

            <img class="avatars followed-avatar" src="{{ route('getImage', [$followed->avatar->filename,  'small'] ) }}" alt="{{ $followed->avatar->name }}">

        @endif
    </div>

    <div>

        <div class="followed-username"> {{ $followed->username }} </div>


    </div>
</div>

</a>
