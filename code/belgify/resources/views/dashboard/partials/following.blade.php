@if(count($my_questions))

    <h2>I'm following</h2>

    @foreach($users as $user)

        <div> {{ $user->username }} | {{ $user->first_name }} {{ $user->last_name }}</div>


    @endforeach

@endif