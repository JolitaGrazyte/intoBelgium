<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comments';

    protected $fillable = ['body', 'post_id'];

    protected $primaryKey = "id";

    /**
     *
     * Comment author, user who placed the comment.
     * Relation to the user model.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function author(){

        return $this->belongsTo('App\User', 'user_id');
    }

    public function post(){

        return $this->belongsTo('App\Post', 'post_id');
    }

    /**
     * Get the tags for the blog post.
     */
    public function votes()
    {
        return $this->morphMany('App\Votes', 'voteable');
    }


//
//    /**
//     * @return \Illuminate\Database\Eloquent\Relations\HasMany
//     */
//    public function votes(){
//
//        return $this->hasMany('App\Votes', 'comment_id', 'id');
//    }


    public function scopePopular($query)
    {
        return $query->where('votes', '>', 100);
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

}
