<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use Illuminate\Http\Request;
use App\Http\Requests;

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
        $users          =   [];

        foreach($my_events as $evnt){

            array_push($users, User::find($evnt->user_id));
        }


           foreach($my_questions as $question){

               foreach($question->comments as $answer){

                   array_push($users, User::find($answer->user_id));
               }
           }

        $users = array_unique($users);

        return view('dashboard', compact('my_events', 'my_questions', 'users'))->withTitle('Dashboard');
    }


}
