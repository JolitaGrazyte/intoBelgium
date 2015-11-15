<?php

namespace App\Http\Controllers;

use App\Libraries\FlashMessages;
use App\Tag;
use App\Comment;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Votes;
use Session;

class CommentsController extends Controller
{

    private $comment;
    private $tag;
    private $authUser;
    private $flashMsg;

    public function __construct( Comment $comment, Tag $tag, FlashMessages $flashMsg ){

        $this->comment  =   $comment;
        $this->tag      =   $tag;
        $this->authUser =   Auth::user();
        $this->flashMsg =   $flashMsg;

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comment    =   $this->comment;
        $comments   =   $comment->latest('created_at')->get();

        return view('comments.index', compact('comments'))->withTitle('Comments');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($question_id)
    {
        $post_id    =   $question_id;
        $tags       =   $this->tag->lists('name', 'id');

        return view('comments.create', compact('tags', 'post_id'))->withTitle('Answer');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store( Request $request )
    {

        $question_id    =   $request->get('post_id');

        try{

            $comment = $this->comment->create($request->all());
            $this->authUser->comments()->save($comment);

            $this->flashMsg->successMessage( 'answer', 'created!');

        }
        catch( QueryException $e ){

            $this->flashMsg->failMessage( 'answer', 'created!');
        }

        return redirect()->route('posts.show', $question_id);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $comment = $this->comment->find($id)->first();
        return view('comments.show', compact('comment'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $comment = $this->comment->find($id);

        $tags = $this->tag->lists('name', 'id');

        $comment_tags = $comment->tags;

        return view('comments.create', compact('tags', 'comment', 'comment_tags'))->withTitle('Answer');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        try{

            $comment = $this->comment->find($id);
            $comment->update($id);

            $this->flashMsg->successMessage( 'answer', 'updated!');


        }
        catch( QueryException $e ){

            $this->flashMsg->failMessage( 'answer', 'updated!');
        }

        return redirect()->back();
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
        $this->comment->destroy($id);
        $this->flashMsg->successMessage( 'answer', 'deleted!');

        return redirect()->back();
    }
    public function postVote( Request $request ){

        $user           = Auth::user();
        $comment_id     = $request->get('comment_id');
        $exist          = Votes::where('user_id', $user->id)->where('comment_id', $comment_id)->exists();

        if(!$exist){

            $vote = new Votes($request->all());
            $user->votes()->save($vote);

            Session::flash('message', "Thank you for voting!");
            Session::flash('alert-class', 'alert-success');
        }
        else {
            Session::flash('message', "Maybe you have forgotten, but you already have voted for this answer.");
            Session::flash('alert-class', 'alert-warning');
        }

        return redirect()->back();

    }
}
