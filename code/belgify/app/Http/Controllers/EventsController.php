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
use Illuminate\Support\Facades\DB;
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

        $this->middleware('auth', ['except' => 'index', 'show']);
        $this->middleware('local', ['only' => ['create', 'edit', 'confirm', 'destroy']]);

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
        $user       =   $this->authUser;
        $user_id    =   !is_null($user) ? $user->id : 0;

        $eventsData = [];

        foreach($events as $key => $event){

            $author = $event->author;
            $start_date = $event->date;

                $eventsData[$event->id] = [

                    'id'            =>  $event->id,
                    'start'         =>  $start_date->format('M j, Y'), //date in format
                    'title'         =>  $event->title,
                    'starts_at'     =>  $start_date->format('H:i'),
                    'description'   =>  str_limit($event->description, 100, ''),
                    'd'             =>  $start_date->format('d'), //date in format: day
                    'fM'            =>  $start_date->format('F'), //date in format: full month
                    'Y'             =>  $start_date->format('Y'), //date in format: year
                    'isAuthor'      =>  $user_id == $event->user_id ? true : false,
                    'author'        =>  $author->first_name.' '.$author->last_name,
                    'attending'     =>  $this->userIsAttendingEvent($user_id, $event->id),
                    'attenders'     =>  count($this->event->attenders)

                ];
            }


//        return $event->all(); //JSON

        return view('events.index', compact('events', 'eventsData'))->withTitle('Events');
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
        $event      = $this->event->find($id);
        $author     = $event->author;
        $start_date = $event->date;
        $user       = $this->authUser;
        $user_id    = !is_null($user) ? $user->id : 0;

        $eventsData[$event->id] = [

            'id'            =>  $event->id,
            'start'         =>  $start_date->format('M j, Y'), //date in format
            'title'         =>  $event->title,
            'starts_at'     =>  $start_date->format('H:i'),
            'description'   =>  str_limit($event->description, 100, ''),
            'd'             =>  $start_date->format('d'), //date in format: day
            'FY'            =>  $start_date->format('F Y'), //date in format: full month + year
            'isAuthor'      =>  $user->id == $event->user_id ? true : false,
            'author'        =>  $author->first_name.' '.$author->last_name,
            'attending'     => $this->userIsAttendingEvent($user->id, $event->id),

        ];
        return view('events.show', compact('event', 'eventsData'));
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

        if ( Auth::user()->id == $event->author->id) {

            $locations = $this->location->lists('name', 'id');
            $tags = $this->tag->lists('name', 'id');
            $evnt_tags = $event->tags->lists('id')->all();

            return view('events.edit', compact('locations', 'tags', 'event', 'id', 'evnt_tags'))->withTitle('Edit event');
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

        $userIsAttendingEvent = $this->userIsAttendingEvent($user->id, $event->id);

        if(!$userIsAttendingEvent){

            $user->events_attending()->attach($event->id);
        }

        Session::flash('message', 'You are going to event:  '.$id.'.');

        return redirect()->back();

    }

    public function userIsAttendingEvent($user_id, $event_id)
    {
        return !is_null(

            DB::table('event_user')
                ->where('user_id', $user_id)
                ->where('event_id', $event_id)
                ->first()
        );

    }

}

