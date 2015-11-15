
<div class="form-group">

    <div class="col-md-12">
        <div id="title-group">
            <p class="help-text"></p>
            {!! Form::text('title', isset($event->title) ? $event->title :null, ['class' => 'form-control', 'placeholder' => 'title']) !!}
        </div>
    </div>

</div>

<div class="form-group">
    <div class="date-group">
        <p class="help-text"></p>
        <div class="input-group date col-md-12" id="datetimepicker">
            {!! Form::text('date', isset($event->date) ? $event->date->format('d/m/Y H:i') :null, ['class' => 'form-control']) !!}
            <span class="input-group-addon"><span class="glyphicon-calendar glyphicon"></span></span>
        </div>
    </div>
</div>

<div class="form-group">
    <div class="col-md-12">
        <div id="description-group">
            <p class="help-text"></p>
            {!! Form::textarea('description', isset($event->description) ? $event->description :null, ['class' => 'form-control',  'placeholder' => 'type a description in here']) !!}
        </div>
    </div>
</div>

<div class="form-group">
    <div class="col-md-12">
        <div id="street_address-group">
            <p class="help-text"></p>
            {!! Form::text('street_address', isset($event->street_address) ? $event->street_address :null, ['class' => 'form-control', 'placeholder' => 'street, house / building nr., evt.: flat nr. ']) !!}
        </div>
    </div>
</div>


<div class="form-group">
    <div class="col-md-12">
        <div id="location-group">
            <p class="help-text"></p>
            {!! Form::select('location', $locations, isset($event->location) ? $event->location->id:null, ['class' => 'form-control', 'placeholder' => 'choose a location']) !!}
        </div>
    </div>
</div>

<div class="form-group">
    <div class="col-md-12">
        <div id="tag_list-group">
            <p class="help-text"></p>
            {!! Form::select('tag_list[]', $tags, isset($event) ? $event->tags->lists('id')->toArray() :null, [ 'id' => 'tag_list', 'class' => 'form-control',  'multiple']) !!}
        </div>
    </div>
</div>


