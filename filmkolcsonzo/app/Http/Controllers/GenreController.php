<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Genre;

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Genre;

class GenreController extends Controller
{
    public function create()
    {
        return view('genres.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
        ]);

        Genre::create([
            'name' => $request->input('name'),
        ]);

        return redirect()->route('genres.create')->with('success', 'A műfajt rögzítettük!');
    }
}

