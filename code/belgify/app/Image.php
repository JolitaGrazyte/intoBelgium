<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Image extends Model
{
    protected $table = 'images';
    /**
     * Get all of the owning imageable models.
     */
    public function imageable()
    {
        return $this->morphTo();
    }

    public function hasProfileImg($user_id)
    {
        return !is_null(

            DB::table('images')
                ->where('imageable_id', $user_id)
                ->first()
        );

    }
}
