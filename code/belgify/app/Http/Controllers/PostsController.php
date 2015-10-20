<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Libraries\FlashMessages;
use App\Post;
use App\Tag;
use Auth;
use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use App\Http\Requests;
//use App\Http\Controllers\Controller;


class PostsController extends Controller
{

    private $post;
    private $tag;
    private $flashMsg;
    private $authUser;

    public function __construct( Post $post, Tag $tag, FlashMessages $flashMsg ){

        $this->middleware('auth', ['except' => 'index', 'show']);

        $this->post     = $post;
        $this->tag      = $tag;
        $this->flashMsg = $flashMsg;
        $this->authUser = Auth::user();

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = $this->post->latest('created_at')->get();
        $user       =   $this->authUser;
        $user_id    =   !is_null($user) ? $user->id : 0;

        $postData = [];

       if(count($posts)){

           foreach($posts as $post){

               $postData = [

               ];

               $votes[$post->id] = count($post->votes);
        }

       }

        return view('posts.index', compact('posts', 'votes'))->withTitle('Questions');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = $this->tag->lists('name', 'id');
        $title = 'Ask a question';
        return view('posts.create', compact('tags'))->withTitle($title);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param PostRequest|Request $request
     * @return \Illuminate\Http\Response
     */
    public function store( PostRequest $request )
    {
        try{

            $post = $this->post;

            $this->postFill($post, $request, 'added');

        }
        catch( QueryException $e ){

            $this->flashMsg->failMessage('added!');
        }

        return redirect()->route('posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post       = $this->post->find($id);
        $answers    = $post->comments;

        foreach($answers as $answer){

            //TODO votes !!!
            //votes
        }

        return view('posts.show', compact('answers', 'id', 'post', 'votes'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = $this->post->find($id);
        if ( Auth::user()->id == $post->author->id) {

            $tags       = $this->tag->lists('name', 'id');
            $post_tags  = $post->tags->lists('id')->all();
            $title      = 'Update your question';

            return view('posts.edit', compact('tags', 'id', 'post', 'post_tags'))->withTitle($title);

        }
        else return redirect()->route('posts.index')->with("message", "Can't update, not your post");


    }

    /**
     * Update the specified resource in storage.
     *
     * @param PostRequest|Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update( PostRequest $request , $id)
    {
        try{

            $post = $this->post->find($id);

            $this->postFill($post, $request, 'updated');

        }
        catch( QueryException $e ){

            $this->flashMsg->failMessage('updated!');
        }

        return redirect()->route('posts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->post->destroy($id);

        return redirect()->route('posts.index');
    }


    /**
     *
     * Sync tags when adding / updating.
     *
     * @param $post
     * @param $tags
     * @internal param $event
     */
    public function syncTags($post, $tags){

        if(isset($tags)){

            $post->tags()->sync($tags);
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


    public function postFill($post, $request, $msg){

        $tags  = $request->get('tag_list');

        $new_post = $post->fill([
            'title'  => $request->get('title'),
            'body'   => $request->get('body'),

        ]);

        $this->authUser->posts()->save($new_post);

        $this->syncTags($new_post, $tags);

        $this->flashMsg->successMessage($msg);

    }
}
