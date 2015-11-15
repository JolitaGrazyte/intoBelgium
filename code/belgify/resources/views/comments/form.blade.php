<div class="form-group">
    <div class="col-md-12">
        <div id="body-group">
            <p class="help-text"></p>
            {!! Form::textarea('body', isset($comment)?$comment->body:null, ['class' => 'form-control',  'placeholder' => 'Place your answer here']) !!}
        </div>
    </div>
</div>

<div class="form-group">

    <div class="col-md-12">
        <div id="tag_list-group">
            <p class="help-text"></p>
            {!! Form::select('tag_list[]', $tags, isset($comment)?$comment_tags:null, [ 'id' => 'tag_list', 'class' => 'form-control',  'multiple']) !!}
        </div>
    </div>
</div>

<div class="form-group">
    <div class="col-md-12">

        {!! Form::submit('Post', ['class' => 'btn btn-primary form-control btn-add']) !!}

    </div>
</div>

{!! Form::close() !!}