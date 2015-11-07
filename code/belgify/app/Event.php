<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'events';

    protected $dates = ['date'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['title', 'date', 'description', 'street_address', 'postcode', 'location_id'];

    protected $primaryKey = "id";

    /**
     *
     * Event author, user who placed the event.
     * Relation to the user model.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function author(){

        return $this->belongsTo('App\User', 'user_id');
    }

    /**
     * Relation with the tag model.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function tags()
    {
        return $this->morphToMany('App\Tag', 'taggable')->withTimestamps();
    }

    /**
     * Scope of events that are active.
     *
     * @param $q
     */
    public function scopeActive($q){
        $q->where('is_active', 1);
    }

    /**
     * Scope of events that are public.
     *
     * @param $q
     */
    public function scopePublic($q){
        $q->where('is_public', 1);

    }

    public function location(){

        return $this->hasOne('App\Location', 'id', 'location_id');
    }

    /**
     * Get all of the events images.
     */
    public function images()
    {
        return $this->morphMany('App\Image', 'imageable');
    }

    public function attenders(){

        return $this->belongsToMany('App\User');
    }


}
