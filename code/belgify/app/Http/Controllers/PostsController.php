<?php

namespace App\Http\Controllers;

use App\Post;
use App\Tag;
use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use App\Http\Requests;
use App\Http\Controllers\Controller;


class PostsController extends Controller
{

    private $post;
    private $tag;

    public function __construct( Post $post, Tag $tag ){

        $this->post = $post;
        $this->tag  = $tag;

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = $this->post->get();

        return view('posts.index', compact('posts'))->withTitle('Questions');
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
        $post = $this->post->create($request->all());
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
        $tags = $this->tag->lists('name', 'id');
        $title = 'Update your question';
        return view('posts.edit', compact('tags'))->withTitle($title);

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


    /**
     *
     * Sync tags when update.
     *
     * @param $post
     * @param $tags
     */
    public function syncTags($post, $tags){

        $post->tags()->sync($tags);

    }
}
