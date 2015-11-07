<?php

namespace App\Http\Controllers;

use App\Http\Requests\SearchJsonRequest;
use App\Http\Requests;
use App\Event;
use App\Post;
use App\Tag;
use Illuminate\Support\Facades\Response;

class SearchController extends Controller
{


    public function getAutocomplete( SearchJsonRequest $request ){

        $term = $request->get('term');

        $tours = Event::all();
        $posts = Post::all();
        $tags = Tag::all();

        $results = [];

        foreach ($tours as $tour)
        {
            $results[] = [ 'id' => $tour->id, 'value' => $tour->title, 'model' => 'events'];
        }


        foreach ($posts as $post)
        {
            $results[] = [ 'id' => $post->id, 'value' => $post->title, 'model' => 'posts'];
        }

        foreach ($tags as $tag)
        {
            $results[] = [ 'id' => $tag->id, 'value' => $tag->name];
        }

        return Response::json($results);
    }




    public function search( SearchJsonRequest $request ){

        $keyword = $request->get('keyword');

//        dd($keyword);

        $tours      = $this->searchTours($keyword);
        $questions  = $this->searchQuestions($keyword);

        $search_results = $this->searchTours($keyword);
//        dd($questions);

//        return [$tours, $questions];

        return view('search.index', compact('search_results'))->withTitle('Search result');
    }

    public function searchTours($keyword){

        $events  = Event::whereHas('tags', function($query) use ($keyword){

            $query->where('title','LIKE', '%'.$keyword.'%');

        })
//            ->where('is_active', 1)->where('is_public', 1)
            ->orWhere('description', 'LIKE', '%'.$keyword.'%')

            ->get();

        return $events;
    }

    public function searchQuestions($keyword){

        $posts  = Post::whereHas('tags', function($query) use ($keyword){

            $query->where('title','LIKE', '%'.$keyword.'%');

        })
//            ->where('is_active', 1)->where('is_public', 1)
            ->orWhere('body', 'LIKE', '%'.$keyword.'%')

            ->get();

        return $posts;
    }
}
