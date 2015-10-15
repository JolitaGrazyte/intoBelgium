<?php

namespace App\Http\Controllers;

use App\Tag;
use App\Comment;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class CommentsController extends Controller
{

    private $comment;
    private $tag;

    public function __construct( Comment $comment, Tag $tag ){

        $this->comment  =   $comment;
        $this->tag      =   $tag;

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comment = $this->comment;

        $comments = $comment->latest('created_at')->get();

        return view('comments.index', compact('comments'))->withTitle('Comments');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = $this->tag->lists('name', 'id');

        return view('comments.create', compact('tags'))->withTitle('Answer');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store( Request $request )
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
        //
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
