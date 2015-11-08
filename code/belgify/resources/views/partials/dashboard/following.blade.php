@if(count($i_follow))

    <h2>I'm following</h2>

    @foreach($i_follow as $user)

        <div> {{ $user->username }} | {{ $user->first_name }} {{ $user->last_name }}</div>


    @endforeach

@endif