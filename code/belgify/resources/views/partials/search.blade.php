{!!Form::open(['route' => ['search'], 'class' => Request::is('/') ? 'form-horizontal search-form' : 'form-horizontal', 'role' => 'form' ])  !!}

{!! Form::text('keyword', null, ['placeholder' => 'Ask a question about the Belgian lifestyle...', 'class' => 'col-md-9 text-search']) !!}
{!! Form::submit('search', ['class' => 'btn btn-primary col-md-3 btn-search']) !!}

{!!Form::close() !!}