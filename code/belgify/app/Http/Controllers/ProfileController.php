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
        $avatar     = $user->avatar;

        return view('profile.index', compact('user', 'location', 'avatar'))->withTitle('Your profile');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user       = $this->user->find($id);
        $locations  = $this->location->lists('name', 'id');
        $location   = $user->location;
        $avatar     = $user->avatar;

        return view('profile.edit', compact('user', 'locations', 'id', 'location', 'avatar'))->withTitle('Edit your profile');
    }

    public function getImage($filename, $size){

        $entry = $this->image->where('filename', '=', $filename)->firstOrFail();

        $file = Storage::disk('local')->get($entry->filename);
        $imgObj = new ImageLib();
        $file = $imgObj->resize_image($filename, $size);

        $response = new Response($file, 200);

        // Modify output's header.
        // Set the content type to the mime of the file.
        $response->header(
            'Content-type',
            $entry->mime
        );

        // Return the image.
        return $response;

//        return (new Response($file, 200))
//            ->header('Content-Type', $entry->mime);
    }


    /**
     * @param UpdateProfileRequest $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update( UpdateProfileRequest $request, $id)
    {
//        dd($request->file('image'));

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

            return redirect()->route('profile.show', $id)->withMessage('Successfully saved!');
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
