<div class="form-group">

    {!! Form::label('title', 'Title', ['class' => 'col-md-1 control-label']) !!}

    <div class="col-md-11">

        {!! Form::text('title', isset($post->title)?$post->title: null, ['class' => 'form-control', 'placeholder' => 'title']) !!}

    </div>
</div>

<div class="form-group">

    {!! Form::label('body', 'Body', ['class' => 'col-md-1 control-label']) !!}

    <div class="col-md-11">

        {!! Form::textarea('body', isset($post->body)?$post->body: null, ['class' => 'form-control',  'placeholder' => 'ask here your question']) !!}

    </div>

</div>

<div class="form-group">

    {!! Form::label('tags', 'Tags', ['class' => 'col-md-1 control-label']) !!}

    <div class="col-md-11">

        {!! Form::select('tag_list[]', $tags, isset($post)?$post->tags->lists('id')->toArray(): null, [ 'id' => 'tag_list', 'class' => 'form-control',  'multiple']) !!}

    </div>

</div>