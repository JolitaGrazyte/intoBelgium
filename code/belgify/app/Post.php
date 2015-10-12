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
    protected $table = 'posts';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['title', 'body','is_active', 'is_public'];

    protected $primaryKey = "id";

    /**
     *
     * Post author, user who placed the event.
     * Relation to the user model.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function author(){

        return $this->belongsTo('App\User', 'user_id');
    }

    /**
     * Get the comments for the blog post.
     */
    public function comments()
    {
        return $this->hasMany('App\Comment');
    }


    /**
     * Get the tags for the blog post.
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


}
