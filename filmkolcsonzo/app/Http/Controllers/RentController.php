<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;

class RentController extends Controller
{
    public function show($id)
    {
        $movie = Movie::with('genre')->findOrFail($id);
        return view('rents.show', compact('movie'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'movie_id' => 'required|exists:movies,id',
            'renter_name' => 'required|string|max:255',
            'rent_date' => 'required|date',
        ]);

        Movie::create($request->all());

        return redirect()->route('movies.index')->with('success', 'Film ki lett kölcsönözve!');
    }
}
