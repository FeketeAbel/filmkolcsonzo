<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;
use App\Models\Rent;
use App\Models\Genre;

class RentController extends Controller
{
    public function show($id)
    {
        $movie = Movie::findOrFail($id);
        return view('rents.show', compact('movie'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'movie_id' => 'required',
            'renter_name' => 'required|string|max:255',
            'rent_date' => 'required|date',
        ]);

        Rent::create($request->all());

        return redirect()->route('movies.index')->with('success', 'Film ki lett kölcsönözve!');
    }

    public function index(Request $request) {
        $query = Rent::query()->with('movie.genre');
        $rents = $query->paginate($request->per_page);
        $genres = Genre::all();
        return view('rents.index', compact('rents','genres'));
    }

    public function update(Request $request)
    {
        $rentIds = $request->input('rent_id');
        $returnDates = $request->input('return_date');
    
        foreach ($rentIds as $rentId) {
            $rent = Rent::find($rentId);
            if ($rent) {
                $rent->return_date = $returnDates[$rentId];
                $rent->save();
            }
        }
    
        return redirect()->route('movies.index')->with('success', 'A visszaadási dátumok frissítve lettek.');
    }
}
