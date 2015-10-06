<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'events';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['title', 'date', 'body', 'is_active', 'is_public'];

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


}
