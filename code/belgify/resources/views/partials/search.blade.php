{!!Form::open(['route' => ['search'], 'class' => 'form-horizontal search-form', 'role' => 'form' ])  !!}

{!! Form::text('keyword', null, ['placeholder' => 'Ask a question about the Belgian lifestyle...', 'class' => 'col-md-9 text-search']) !!}
{!! Form::submit('search', ['class' => 'btn btn-primary col-md-3 btn-search']) !!}

{!!Form::close() !!}