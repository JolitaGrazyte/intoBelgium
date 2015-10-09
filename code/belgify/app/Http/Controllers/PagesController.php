<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;


class PagesController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    /**
     * Return requested page.
     *
     * @param $page
     * @return \Illuminate\Http\RedirectResponse
     */
    public function index( $page ){

        switch( $page ) {

            case 'home':

                return view('home');

                break;

            case 'dashboard':

                return view('dashboard');

                break;


        }


    }

}
