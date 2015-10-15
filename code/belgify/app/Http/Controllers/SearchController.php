<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Event;
use App\Post;

class SearchController extends Controller
{


    public function search( Request $request ){

        $keyword = $request->get('keyword');

//        dd($keyword);

        $tours      = $this->searchTours($keyword);
        $questions  = $this->searchQuestions($keyword);

//        dd($questions);

        return [$tours, $questions];

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
