<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArtistController;
use App\Http\Controllers\LpController;

Route::get("/", [LpController::class, "index"])->name("index");
Route::get("search", [ArtistController::class, "search"])->name("artists.search");
Route::resource('artists', ArtistController::class);
Route::resource('lps', LpController::class);
