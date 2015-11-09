<?php

namespace App\Http\Controllers;

use App\Location;
use App\User;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\UpdateProfileRequest;
use Storage;
use File;
use App\Image;
use Illuminate\Http\Response;
use App\Libraries\ImageLib;


class ProfileController extends Controller
{

    private $user;
    private $location;
    private $image;

    public function __construct( User $user, Location $location, Image $image ){

        $this->user     = $user;
        $this->location = $location;
        $this->image    = $image;

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('partials.dashboard.following');
    }


    /**
     * Display the specified resource.
     *
     * @param $username
     * @return Response
     * @internal param int $id
     */
    public function show($username)
    {

        $user_name = str_replace('-', ' ', $username);
        $user       = $this->user->where('username', $user_name)->first();
        $location   = $user->location;
        $avatar     = $user->avatar;

        return view('profile.index', compact('user', 'location', 'avatar'))->withTitle('Your profile');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $username
     * @return Response
     * @internal param int $id
     */
    public function edit($username)
    {
        $user_name  = str_replace('-', ' ', $username);
        $user       = $this->user->where('username', $user_name)->first();
        $locations  = $this->location->locations();
        $location   = $user->location;
        $avatar     = $user->avatar;

        return view('profile.edit', compact('user', 'locations', 'location', 'avatar'))->withTitle('Edit your profile');
    }

    public function getImage($filename, $size){

        $entry = $this->image->where('filename', '=', $filename)->firstOrFail();

        $file = Storage::disk('local')->get($entry->filename);
        $imgObj = new ImageLib();
        $file = $imgObj->resize_image($filename, $size);

        return (new Response($file, 200))
            ->header('Content-Type', $entry->mime);
    }




    /**
     * @param UpdateProfileRequest $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update( UpdateProfileRequest $request, $id)
    {

        $user = $this->user->find($id);

        $user->update($request->all());

        if($request->file('image')){

            try{

            $imgObj = $this->image;
            $imgLib = new ImageLib();

            $img = $imgLib->addImage($request->file('image'), $imgObj, $user->username, $user->id );

            }
            catch(QueryException $e){

                redirect()->back()->withMessage('There were some problems uploading your image.');
            }
        }

        $username = str_replace('-', ' ', $user->username);

//        dd($username);

            return redirect()->route('profile.show', $username)->withMessage('Successfully saved!');
    }

}
