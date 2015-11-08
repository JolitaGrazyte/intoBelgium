
<div class="col-md-3 following">
    <div class="row">
        @if($followed->avatar)

            <img class="avatars followed-avatar" src="{{ route('getImage', [$followed->avatar->filename,  'small'] ) }}" alt="{{ $followed->avatar->name }}">

        @endif
    </div>

    <div class="row">
        <div class="followed-username"> {{ $followed->username }} </div>
    </div>
</div>
