<?php

namespace App\Http\Controllers;

use App\Http\Requests\SearchJsonRequest;
use Illuminate\Http\Request;
use App\Event;
use App\Post;
use App\Tag;
use Illuminate\Support\Facades\Response;

class SearchController extends Controller
{

    public function index( Request $request ,$term= null){

        $term_search = is_null($term) ? $request->get('term') : $term;

        $tours      = $this->searchTours($term_search);
        $questions  = $this->searchQuestions($term_search);

        return view('search.index', compact('tours', 'questions'))->withTitle('Search Results');
    }


    function searchResultData($results, $model){

        $search_results = [];

            foreach($results as $result){

                $search_results = [

                    'id'            => $result->id,
                    'model'         => $model,
                    'title'         => $result->title,
                    'body'          => $result->description ? $result->description : $result->body,
                    'tags'          => $result->tags,

                    'created_at'    => $result->created_at,


                ];

            }


        return $search_results;

    }

    public function searchTours($keyword){

        $events  = Event::whereHas('tags', function($query) use ($keyword){

            $query->where('name','LIKE', '%'.$keyword.'%');

        })
            ->orWhere('title', 'LIKE', '%'.$keyword.'%')
            ->orWhere('description', 'LIKE', '%'.$keyword.'%')
            ->get();

        return $events;
    }

    public function searchQuestions($keyword){

        $posts  = Post::whereHas('tags', function($query) use ($keyword){

            $query->where('name','LIKE', '%'.$keyword.'%');

        })
            ->orWhere('title', 'LIKE', '%'.$keyword.'%')
            ->orWhere('body', 'LIKE', '%'.$keyword.'%')
            ->get();

        return $posts;
    }


    public function getAutocomplete( SearchJsonRequest $request ){

        $term = $request->get('term');

        $tours  = Event::all();
        $posts  = Post::all();
        $tags   = Tag::all();

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

        $tours      = $this->searchTours($keyword);
        $questions  = $this->searchQuestions($keyword);

        $search_results = $this->searchTours($keyword);

        return view('search.index', compact('search_results'))->withTitle('Search result');
    }
}
