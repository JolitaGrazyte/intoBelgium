@if (Session::has('message'))

    <div class="alert {{ Session::get('alert-class', 'alert-info') }}">

        <button type="button" class="close" data-dismiss="alert" aria-hideen="true">&times;</button>
        {{ session('message') }}

    </div>

@endif

{{--@if (Session::has('flash_notification.message'))--}}
    {{--<div class="alert alert-{{ Session::get('flash_notification.level') }}">--}}
        {{--<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>--}}

        {{--{{ Session::get('flash_notification.message') }}--}}
    {{--</div>--}}
{{--@endif--}}