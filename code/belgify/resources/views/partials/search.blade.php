{!!Form::open(['route' => ['search'], 'class' => Request::is('/') ? 'form-horizontal search-form' : 'form-horizontal', 'role' => 'form' ])  !!}

{!! Form::text('term', null, ['placeholder' => 'Ask a question about the Belgian lifestyle...', 'class' => 'autocomplete col-md-9 text-search']) !!}

{!! Form::submit('search', ['class' => 'btn btn-primary col-md-3 btn-search']) !!}

{!!Form::close() !!}

{{--<script>--}}
    {{--$( ".autocomplete" ).autocomplete({--}}
        {{--source: "{{ url('search-json') }}",--}}
        {{--minLength:1,--}}
    {{--}).on( "autocompleteselect", function( event, ui ) {--}}
        {{--var term_id = ui.item.id;--}}
        {{--var model = ui.item.model;--}}

{{--//        console.log(ui.item.id);--}}

        {{--window.location.href = 'http://intob.local.com/'+model+'/'+term_id;--}}
    {{--});--}}
{{--</script>--}}