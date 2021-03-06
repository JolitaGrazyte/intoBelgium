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
use App\EventData;
/**
 * Class EventsController
 * @package App\Http\Controllers
 */
class EventsController extends Controller
{
    private $event;
    private $tag;
    private $authUser;
    private $flashMsg;
    private $location;


    public function __construct( Event $event, Tag $tag, FlashMessages $flashMsg, Location $location ){

//        $this->middleware('auth', ['except' => 'index', 'show']);
//        $this->middleware('local', ['only' => ['create', 'edit', 'confirm', 'destroy']]);

        $this->event    = $event;
        $this->flashMsg = $flashMsg;
        $this->tag      = $tag;
        $this->location = $location;
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
        $events     =   $event->oldest('date')->get();
//        $user       =   $this->authUser;
////        $user_id    =   !is_null($user) ? $user->id : 0;
//
////        foreach($events as $event){
////
////            $eventsData[$event->id] = EventData::eventData($event, $user_id);
////
////        }

        return view('events.index', compact('events', 'eventsData'))->withTitle('Events');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags       = $this->tag->lists('name', 'id');
        $locations  = $this->location->locations();
        $now        = Carbon::now()->format('d/m/Y H:i');

        return view('events.create', compact('locations', 'tags', 'now'))->withTitle('Create event');
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

            $this->flashMsg->failMessage('event','added!');
        }

        if ($request->ajax()) {
            return response()->json(['success']);
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
        $event          = $this->event->find($id);
        $authUser       = Auth::user();
        if( $authUser){
            $isAttending    = $authUser->userIsAttendingEvent($authUser->id, $event->id);
        }

        return view('events.show', compact('event', 'isAttending'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $event      =   $this->event->find($id);

        if ( Auth::user()->id == $event->author->id) {

            $locations  = $this->location->locations();
            $location   = ['id' => $event->location->id, 'name' => $event->location->name.', '.$event->location->postcode];
            $tags       = $this->tag->lists('name', 'id');
            $now        = Carbon::now();

            $date = $event->date->format('d/m/Y H:i');

            return view('events.edit', compact('locations', 'tags', 'event', 'evnt_tags', 'location', 'date', 'now'))->withTitle('Edit event');
        }

        else return redirect()->route('events.index')->with("message", "Can't update, not your event!");

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

            $this->flashMsg->failMessage( 'event','updated!');
        }

        if ($request->ajax()) {

            return response()->json(['success']);
        }

        return redirect()->route('events.index');

    }


    /**
     * Requires to confirm removing.
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete_confirm($id){

        Session::flash('confirmDelete', $id);
        return redirect()->back();
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $this->event->destroy($id);
        $this->flashMsg->successMessage( 'event', 'deleted!');

        return redirect()->back();
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
     * @param $event
     * @param $request
     * @param $msg
     */
    public function eventFill($event, $request, $msg){

        $tags   = $request->get('tag_list');

        $date = date('Y-m-d h:i:s', strtotime($request->date));

        $new_event   = $event->fill([
            'title'         => $request->get('title'),
            'description'   => $request->get('description'),
            'date'          => $date,
            'street_address'=> $request->get('street_address'),
            'location_id'   => $request->get('location'),

        ]);

        $this->authUser->events()->save($new_event);

        $this->syncTags($new_event, $tags);

        $this->flashMsg->successMessage( 'event', $msg);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postAttend($id){

        $event = $this->event->find($id);

        $user = Auth::user();

        $userIsAttendingEvent = $this->authUser->userIsAttendingEvent($user->id, $event->id);

        if(!$userIsAttendingEvent){

            $user->events_attending()->attach($event->id);

            Session::flash('message', 'You are going to event:  '.$event->title.'.');
        }
        else{

            $user->events_attending()->detach($event->id);

            Session::flash('message', 'You are not going to event:  '.$event->title.'.');

        }

        return redirect()->back();

    }

}

