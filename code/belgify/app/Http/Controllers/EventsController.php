<?php

namespace App\Http\Controllers;

use App\Location;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Requests\EventRequest;
use App\Http\Requests;
use App\Libraries\FlashMessages;
use App\Event;
use App\Tag;
use Auth;
use Session;

/**
 * Class EventsController
 * @package App\Http\Controllers
 */
class EventsController extends Controller
{
    private $event;
    private $location;
    private $tag;
    private $authUser;
    private $flashMsg;


    public function __construct( Event $event, Location $location, Tag $tag, FlashMessages $flashMsg ){

        $this->event    = $event;
        $this->location = $location;
        $this->flashMsg = $flashMsg;
        $this->tag      = $tag;
        $this->authUser = Auth::user();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $event      =   $this->event;
        $events     =   $event->latest('created_at')->get();
        $user       =   Auth::user();
        $my_events  =   $user->events_attending;

//        dd($my_events);

        return view('events.index', compact('events', 'my_events'))->withTitle('Events');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $locations  =   $this->location->lists('name', 'id');
        $tags       =   $this->tag->lists('name', 'id');

        return view('events.create', compact('locations', 'tags'))->withTitle('Create event');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param EventRequest|Request $request
     * @return \Illuminate\Http\Response
     */
    public function store( EventRequest $request)
    {
        try{

            $event = $this->event;

            $this->eventFill( $event, $request, 'added' );

        }
        catch( QueryException $e ){

            $this->flashMsg->failMessage('added!');
        }

        return redirect()->route('events.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //ToDo: postcode automatisch volgens locatie !!

        $event      =   $this->event->find($id);
        $locations  =   $this->location->lists('name', 'id');
        $tags       =   $this->tag->lists('name', 'id');
        $evnt_tags  =   $event->tags->lists('id')->all();

        return view('events.edit', compact('locations', 'tags', 'event', 'id', 'evnt_tags'))->withTitle('Edit event');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param EventRequest|Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update( EventRequest $request, $id)
    {
        try{

            $event = $this->event->find($id);

            $this->eventFill( $event, $request, 'updated' );

        }
        catch( QueryException $e ){

            $this->flashMsg->failMessage('updated!');
        }

        return redirect()->route('events.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->event->destroy($id);

        return redirect()->route('events.index');
    }

    /**
     *
     * Sync tags when adding / updating.
     *
     * @param $event
     * @param $tags
     */
    public function syncTags($event, $tags){

        if(isset($tags)){

            $event->tags()->sync($tags);

        }

    }


    /**
     * Check if session exist and return it.
     * @param $q
     * @return mixed
     */
    public function session($q){

        if( Session::has($q))
            return Session::get($q);
    }


    public function eventFill($event, $request, $msg){

        $tags   = $request->get('tag_list');

        $date = date('Y-m-d h:i:s', strtotime($request->date));

        $new_event   = $event->fill([
            'title'         => $request->get('title'),
            'description'   => $request->get('description'),
            'date'          => $date,
            'street_address'=> $request->get('street_address'),
            'postcode'      => $request->get('postcode'),
            'location_id'   => $request->get('location_id'),
            'city'          => $request->get('city'),

        ]);

         $this->authUser->events()->save($new_event);

        $this->syncTags($new_event, $tags);

        $this->flashMsg->successMessage($msg);
    }

    public function postAttend($id){

        $event = $this->event->find($id);

        $user = Auth::user();

//        $user->events_attending()->sync([$event->id]);
        $user->events_attending()->attach($event->id);

//        dd($user->events_attending);

        Session::flash('message', 'You are going to event:  '.$id.'.');

        return redirect()->back();

    }
}

