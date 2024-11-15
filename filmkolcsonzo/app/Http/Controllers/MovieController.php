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

    public function index(Request $request)
    {
        $query = Movie::query();

        if ($request->filled('title')) {
            $query->where('title', 'like', '%' . $request->input('title') . '%');
        }

        $movies = $query->with('genre');

        return view('movies.index', compact('movies'));
    }

    public function destroy($id)
    {
        Movie::findOrFail($id)->delete();
        return redirect()->route('movies.index')->with('success', 'A filmet töröltük!');
    }
}
