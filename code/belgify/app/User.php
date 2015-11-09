<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Support\Facades\DB;

class User extends Model implements AuthenticatableContract,
    AuthorizableContract,
    CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['username', 'email', 'password', 'role', 'first_name', 'last_name', 'birth_date', 'occupation', 'origin', 'location_id', 'story'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];


    public function following(){

        return $this->belongsToMany('App\User', 'user_follower', 'user_id', 'follower_id')->withTimestamps();

    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function location(){

        return $this->hasOne('App\Location', 'id', 'location_id');

    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function posts()
    {
        return $this->hasMany('App\Post');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function comments()
    {
        return $this->hasMany('App\Comment');
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function events(){

        return $this->hasMany('App\Event');
    }

    /**
     * Get all of the users images.
     */
    public function avatar()
    {
        return $this->hasOne('App\Image', 'imageable_id');
    }


    /**
     * @param $query
     * @return mixed
     */
    public function scopeEvents($query)
    {
        return $query->where();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function events_attending(){

        return $this->belongsToMany('App\Event')->withTimestamps();
    }

    /**
     * @return bool
     */
    public function isLocal(){

        return $this->role == 1 ? true : false; // role 1 = LOCAL

    }

    public function isAuthor($q){

     return $this->id == $q->id;

    }

    public function userIsAttendingEvent($user_id, $event_id)
    {
        return !is_null(

            DB::table('event_user')
                ->where('user_id', $user_id)
                ->where('event_id', $event_id)
                ->first()
        );

    }


    public function userIsFollowing($user_id, $follower_id)
    {
        return !is_null(

            DB::table('user_follower')
                ->where('user_id', $user_id)
                ->where('follower_id', $follower_id)
                ->first()
        );

    }


}
