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

    public function getImage($filename){

        $entry = Image::where('filename', '=', $filename)->firstOrFail();
//        dd($entry->filename);

        $file = Storage::disk('local')->get($entry->filename);

//        dd($file);

        return (new Response($file, 200))
            ->header('Content-Type', $entry->mime);
    }

    public function postImage( $img, $toName, $user_id ){

        try {
            // request all needed fields

//            dd($img->getClientOriginalExtension());
            $name = $toName;

            $filename = str_replace(' ', '-', $name);

            $extension = $img->getClientOriginalExtension();
            Storage::disk('local')->put($filename . '.' . $extension, File::get($img));
            $entry = $this->image;
            $entry->name = $name;
            $entry->imageable_id = $user_id;
            $entry->imageable_type = 'App\User';
//            $entry->mime = $image->getClientMimeType();
//            $entry->original_filename = $image->getClientOriginalName();
            $entry->filename = $filename . '.' . $extension;
            $entry->save();

        }
        catch(QueryException $e){

            redirect()->route('profile.show')->withMessage('There were some problems uploading your image.');
        }

        return redirect()->route('profile.show')->withMessage('Successfully saved!');

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

            $this->postImage($request->file('image'), $user->username, $user->id );
        }

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
