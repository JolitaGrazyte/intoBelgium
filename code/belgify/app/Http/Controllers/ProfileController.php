<?php

namespace App\Http\Controllers;

use App\Location;
use App\User;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\UpdateProfileRequest;

class ProfileController extends Controller
{

    private $user;
    private $location;

    public function __construct( User $user, Location $location ){

        $this->user     = $user;
        $this->location = $location;

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user       = $this->user->find($id);
        $location   = $user->location;

        return view('profile.index', compact('user', 'location'))->withTitle('Your profile');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user          = $this->user->find($id);
        $locations     = $this->location->lists('name', 'id');
        $location      = $user->location;

        return view('profile.edit', compact('user', 'locations', 'id', 'location'))->withTitle('Edit your profile');
    }


    /**
     * @param UpdateProfileRequest $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update( UpdateProfileRequest $request, $id)
    {

        $user = $this->user->find($id);

        $user->fill($request->all())->save();

            return redirect()->route('profile.show', $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
