<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $table = 'locations';

    protected $fillable = ['name', 'postcode'];

    protected $primaryKey = "id";

    /**
     * @return mixed
     */
    public function locations(){

        $dbLocations  = Location::get();

        foreach($dbLocations as $location){

            $locations[$location->id] = $location->name.', '.$location->postcode;
        }
        return $locations;
    }


}
