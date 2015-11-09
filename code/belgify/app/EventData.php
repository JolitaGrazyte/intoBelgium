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

    public static function eventData($event, $user_id){


        $isAuth         = Auth::check('auth');
        $author         = $event->author;
        $start_date     = $event->date;
        $isAuthor       = $isAuth ? Auth::user()->isAuthor( $author) : false;
        $author_name    = $author->username;

        return [

            'id'            =>  $event->id,
            'start'         =>  $start_date->format('M j, Y'), //date in format
            'title'         =>  $event->title,
            'starts_at'     =>  $start_date->format('H:i'),
            'description'   =>  $event->description,
            'd'             =>  $start_date->format('d'), //date in format: day
            'M'             =>  $start_date->format('M'), //date in format: month (short)
            'Y'             =>  $start_date->format('Y'), //date in format: year
            'isAuthor'      =>  $isAuthor,
            'author'        =>  $author_name,
            'attending'     =>  $isAuth ? Auth::user()->userIsAttendingEvent($user_id, $event->id) : false,
            'attenders'     =>  count($event->attenders),
            'location'      =>  !is_null($event->location) ? $event->location->name.', '.$event->location->postcode : ' ',
            'tags'          =>  $event->tags

        ];
    }

}