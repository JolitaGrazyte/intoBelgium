<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Votes extends Model
{
    protected $table = 'votes';

    protected $fillable = ['body', 'votes'];

    protected $primaryKey = "id";


    public function comments()
    {
        return $this->hasMany('App\Comment');
    }
}
