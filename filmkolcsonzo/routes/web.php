<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\MovieController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/new-genre', [GenreController::class, 'create'])->name('genres.create');
Route::post('/new-genre', [GenreController::class, 'store'])->name('genres.store');

Route::get('/new-film', [MovieController::class, 'create'])->name('movies.create');
Route::post('/new-film', [MovieController::class, 'store'])->name('movies.store');

Route::get('/films', [MovieController::class, 'index'])->name('movies.index');
Route::delete('/films/{id}', [MovieController::class, 'destroy'])->name('movies.destroy');