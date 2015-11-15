<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Votes extends Model
{
    protected $table = 'votes';

    protected $fillable = ['user_id', 'voteable_id', 'voteable_type'];

    protected $primaryKey = "id";


    public function voteable()
    {
        return $this->morphTo();
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

    public function voteExists($user_id,  $id, $model){

        return $this->where('user_id', $user_id)->where('voteable_id', $id)->where('voteable_type', $model)->exists();
    }
}
