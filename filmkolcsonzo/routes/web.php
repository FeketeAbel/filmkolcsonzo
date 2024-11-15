<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\RentController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/new-genre', [GenreController::class, 'create'])->name('genres.create');
Route::post('/new-genre', [GenreController::class, 'store'])->name('genres.store');

Route::get('/new-film', [MovieController::class, 'create'])->name('movies.create');
Route::post('/new-film', [MovieController::class, 'store'])->name('movies.store');

Route::get('/films', [MovieController::class, 'index'])->name('movies.index');
Route::delete('/films/{id}', [MovieController::class, 'destroy'])->name('movies.destroy');

Route::get('/films/{id}', [RentController::class, 'show'])->name('movies.show');
Route::post('/rent', [RentController::class, 'store'])->name('rents.store');