<?php

use App\Http\Controllers\AnunciosController;
use Illuminate\Support\Facades\Route;

Route::namespace("Api")->prefix("anuncios")->group(function () {
    Route::get("/", [AnunciosController::class, "getAnuncios"]);
    Route::get("/{id}", [AnunciosController::class, "getAnunciosId"]);
    Route::post("/", [AnunciosController::class, "setAnuncios"]);
    Route::put("/", [AnunciosController::class, "atualizarAnunciosId"]);
    Route::delete("/", [AnunciosController::class, "excluirAnunciosId"]);
});
