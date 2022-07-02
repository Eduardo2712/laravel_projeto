<?php

use App\Http\Controllers\AnunciosController;
use Illuminate\Support\Facades\Route;

Route::get("/", [AnunciosController::class, "index"]);
