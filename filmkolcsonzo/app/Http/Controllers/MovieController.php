<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;
use App\Models\Genre;

class MovieController extends Controller
{
    public function create()
    {
        $genres = Genre::all();
        return view('movies.create', compact('genres'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'director' => 'required|max:255',
            'genre_id' => 'required|exists:genres,id',
            'release_year' => 'required|integer',
        ]);

        Movie::create($request->all());

        return redirect()->route('movies.create')->with('success', 'A filmet rögzítettük!');
    }
}
