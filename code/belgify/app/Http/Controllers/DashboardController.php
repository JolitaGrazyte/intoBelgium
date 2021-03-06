<?php

namespace App\Http\Controllers;

use App\Event;
use App\User;
use Auth;
use Session;


class DashboardController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user           =   Auth::user();
        $my_events      =   Event::myevent($user->id)->get();
        $my_questions   =   $user->posts;
        $i_follow       =   $user->following->all();
        $followed       =   [];


        foreach($i_follow as $f){

            $last_comment  = $f->comments->last();
            $last_event   = $f->events->last();
            $last_post    = $f->posts->last();

            $last_events_attending = $f->events_attending->last();

            $last =  $last_comment['created_at'] < $last_post['created_at'] ? $last_post:$last_comment;
            $last =  $last['created_at'] > $last_event['created_at'] ? $last:$last_event;
            $last =  $last['created_at'] > $last_events_attending['created_at'] ? $last:$last_events_attending;

            $followed[$f->id] = [
                'person' => $f,
                'last'    => $last,
//                'last_post'     => $last_post,
            ];
        }

        $events_attending = $user->events_attending;
        if(count($followed)){
            $followsplitter = ceil(count($followed) / 3);

        }
        return view('dashboard', compact('my_events', 'my_questions', 'i_follow', 'events_attending', 'followed', 'followsplitter'))->withTitle('Dashboard');
    }


    public function postFollow($id){

            $user = User::find($id);

            $follower = Auth::user();

            $userIsFollowed = $follower->isFollowing($user->id, $follower->id);

            if($userIsFollowed){

                $follower->following()->detach($user->id);

                Session::flash('message', 'You are not anymore following:  '.$user->username.'.');
            }
            else{

                $follower->following()->attach($user->id);

                Session::flash('message', 'Now you are following:  '.$user->username.'.');

            }

            return redirect()->back();

    }

}
