@if (Session::has('message'))

    <div class="alert {{ Session::get('alert-class', 'alert-info') }}">

        <button type="button" class="close" data-dismiss="alert" aria-hideen="true">&times;</button>
        {{ session('message') }}

    </div>

@endif