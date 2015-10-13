<?php

namespace App\Http\Controllers;

use Auth;
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

        return view('dashboard', compact('my_events', 'my_questions'))->withTitle('Dashboard');
    }


}
