<?php

/**
 * Created by PhpStorm.
 * User: jolita_pabludo
 * Date: 08/11/15
 * Time: 17:35
 */

namespace App;

use Auth;

class EventData
{

    private $auth;

    public function __construct( Auth $auth ){

        $this->auth = $auth;
    }

    public function eventData($event, $user_id){

        $author         = $event->author;
        $start_date     = $event->date;
        $isAuthor       = Auth::user()->isAuthor( $author);
        $author_name    = $author->first_name.' '.$author->last_name;


        return [

            'id'            =>  $event->id,
            'start'         =>  $start_date->format('M j, Y'), //date in format
            'title'         =>  $event->title,
            'starts_at'     =>  $start_date->format('H:i'),
            'description'   =>  str_limit($event->description, 100, ''),
            'd'             =>  $start_date->format('d'), //date in format: day
            'fM'            =>  $start_date->format('F'), //date in format: full month
            'Y'             =>  $start_date->format('Y'), //date in format: year
            'isAuthor'      =>  $isAuthor,
            'author'        =>  $author_name,
            'attending'     =>  Auth::user()->userIsAttendingEvent($user_id, $event->id),
            'attenders'     =>  count($event->attenders),
            'location'      =>  !is_null($event->location) ? $event->location->name.', '.$event->location->postcode : ' '

        ];
    }

}