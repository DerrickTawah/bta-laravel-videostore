<?php

namespace App\Http\Controllers;

use App\Movie;
use App\Author;
use App\Http\Requests\MovieRequest;

class MovieController extends Controller
{
   public function index() {
        $data = Movie::orderBy('title')->paginate(config('my.pagination_limit'));
        return view('public.movie.index', compact('data'));
   }

    public function show( $id ) {
        $data = Movie::whereId($id)->first();
        return view('public.movie.show', compact('data'));
    }
}
