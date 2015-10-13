<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comments';

    protected $fillable = ['body'];

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
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function votes(){

        return $this->hasMany('App\Votes', 'comment_id', 'id');
    }


    public function scopePopular($query)
    {
        return $query->where('votes', '>', 100);
    }


}
