<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TerrainController;

Route::get('/', function () {
    return view('welcome');
});
Route::apiResource('terrains', TerrainController::class);
