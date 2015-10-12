<?php

namespace App\Http\Controllers;

use App\Location;
use Illuminate\Http\Request;
use App\Http\Requests\EventRequest;
use App\Http\Requests;
//use App\Http\Controllers\Controller;
use App\Event;
use App\Tag;
use Auth;

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


    public function __construct( Event $event, Location $location, Tag $tag ){

        $this->event    = $event;
        $this->location = $location;
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
        $event = $this->event;
        $events = $event->latest('created_at')->get();

        return view('events.index', compact('events'))->withTitle('Events');
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
        $tags  = $request->get('tags');

        $event = $this->event->create($request->all());

        $this->authUser->events()->save($event);

        $this->attachTags($event, $tags);

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

        return view('events.edit', compact('locations', 'tags', 'event', 'id'))->withTitle('Edit event');
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
        $tags  = $request->get('tags');
        $event = $this->event->find($id);

        $event->update($request->all());

        $this->authUser->events()->save($event);

        $this->syncTags($event, $tags);

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
        //
    }

    /**
     *
     * Sync tags when update.
     *
     * @param $event
     * @param $tags
     */
    public function syncTags($event, $tags){

        $event->tags()->sync($tags);

    }

    /**
     *
     * Attach tags when adding a new event.
     *
     * @param $event
     * @param $tags
     * @internal param $teams
     */
    public function attachTags($event, $tags){

        $event->tags()->sync($tags);

    }
}
