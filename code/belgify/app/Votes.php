<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Votes extends Model
{
    protected $table = 'votes';

//    protected $fillable = ['body', 'votes'];

    protected $primaryKey = "id";


    public function comments()
    {
        return $this->hasMany('App\Comment', 'comment_id');
    }

    /**
     *
     * Vote author, user who placed the vote.
     * Relation to the user model.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function author(){

        return $this->belongsTo('App\User', 'user_id');
    }
}