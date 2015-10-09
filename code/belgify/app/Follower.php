<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Follower extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'followers';

    protected $fillable = ['follower_id', 'user_id'];

    protected $primaryKey = "id";
}
