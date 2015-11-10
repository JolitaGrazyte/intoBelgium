<?php

namespace App\Http\Controllers;

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
        $my_events      =   $user->events_attending;
        $my_questions   =   $user->posts;
        $i_follow       =   $user->following;


        return view('dashboard', compact('my_events', 'my_questions', 'i_follow'))->withTitle('Dashboard');
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
