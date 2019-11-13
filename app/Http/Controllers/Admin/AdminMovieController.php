<?php

namespace App\Http\Controllers\Admin;

use App\Movie;
use App\Author;
use App\Http\Requests\MovieRequest;

class AdminMovieController extends AdminController
{
   public function index() {
        $data = Movie::orderBy('title')->paginate(30);

        return view('admin.movie.index', compact('data'));
   }

    public function show( $id ) {
        $data = Movie::whereId($id)->first();
        return view('admin.movie.show', compact('data'));
    }

    public function edit( $id = null ) {
        $data = ($id > 0) ? Movie::whereId($id)->first() : null;
        $authors = Author::orderBy('lastname')->get();
        return view('admin.movie.edit', compact('data','authors'));
    }

    public function store( MovieRequest $request, $id = null) {
        $validated = $request->validated();
        if( $id > 0 ) {
            Movie::whereId($id)->update($validated);
        } else {
            Movie::create($validated);
        }
        return redirect()->route('admin-movie.index');
    }

    public function delete( $id ) {
        Movie::destroy($id);
        return redirect()->route('admin-movie.index');
    }
}
