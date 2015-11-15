
<div class="form-group">

    <div class="col-md-12">
        <div id="title-group">
            <p class="help-text"></p>
            {!! Form::text('title', isset($event->title) ? $event->title :null, ['class' => 'form-control', 'placeholder' => 'title']) !!}
        </div>
    </div>

</div>

<div class="form-group">

        <div class="input-group date col-md-10" id="datetimepicker">

            {!! Form::text('date', isset($event->date) ? $event->date->format('d/m/Y H:i') :null, ['class' => 'form-control']) !!}

            <span class="input-group-addon"><span class="glyphicon-calendar glyphicon"></span></span>

        </div>
</div>

<div class="form-group">

    {!! Form::label('description', 'Description', ['class' => 'col-md-2 control-label']) !!}

    <div class="col-md-10">

        {!! Form::textarea('description', isset($event->description) ? $event->description :null, ['class' => 'form-control',  'placeholder' => 'type a description in here']) !!}

    </div>

</div>

<div class="form-group">

    {!! Form::label('street_address', 'Street Address', ['class' => 'col-md-2 control-label']) !!}

    <div class="col-md-10">

        {!! Form::text('street_address', isset($event->street_address) ? $event->street_address :null, ['class' => 'form-control', 'placeholder' => 'street, house / building nr., evt.: flat nr. ']) !!}

    </div>
</div>


<div class="form-group">

    {!! Form::label('location', 'Location', ['class' => 'col-md-2 control-label']) !!}

    <div class="col-md-10">

        {!! Form::select('location', $locations, isset($event->location) ? $event->location->id:null, ['class' => 'form-control', 'placeholder' => 'choose a location']) !!}

    </div>

</div>

<div class="form-group">

    {!! Form::label('tags', 'Tags', ['class' => 'col-md-2 control-label']) !!}

    <div class="col-md-10">

        {!! Form::select('tag_list[]', $tags, isset($event) ? $event->tags->lists('id')->toArray() :null, [ 'id' => 'tag_list', 'class' => 'form-control',  'multiple']) !!}

    </div>

</div>


