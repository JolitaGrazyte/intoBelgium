@if (Session::has('confirmDelete'))

    <div class="alert alert-danger ">

        <span>Are you sure you want to remove your post ? </span>

        <a href="{{ route('delete', session('confirmDelete')) }}">Yes</a> || <a href="">Cancel</a>

    </div>

@endif