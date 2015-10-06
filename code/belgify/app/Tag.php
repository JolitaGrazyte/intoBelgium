<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $table = 'tags';

    protected $fillable = ['name'];

    protected $primaryKey = "id";


    public function posts()
    {
        return $this->morphedByMany('App\Post', 'taggable');
    }


    public function events()
    {
        return $this->morphedByMany('App\Eevent', 'taggable');
    }


}
