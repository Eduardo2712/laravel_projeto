<?php

use App\Http\Controllers\AnunciosController;
use App\Http\Controllers\RealStateController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UsuariosController;
use Illuminate\Support\Facades\Route;


// Anuncios
Route::prefix("anuncios")->group(function () {
    Route::get("/", [AnunciosController::class, "getAnuncios"]);
    Route::get("/{id}", [AnunciosController::class, "getAnunciosId"]);
    Route::post("/", [AnunciosController::class, "setAnuncios"]);
    Route::put("/", [AnunciosController::class, "atualizarAnunciosId"]);
    Route::delete("/", [AnunciosController::class, "excluirAnunciosId"]);
});

// Usuarios
Route::prefix("usuarios")->group(function () {
    Route::post("/", [UsuariosController::class, "save"]);
});

// Route::resource("usuarios", UsuariosController::class);

Route::prefix("v1")->group(function () {
    Route::name("real_states.")->group(function () {
        Route::resource("real-states", RealStateController::class);
    });

    Route::name("users.")->group(function () {
        Route::resource("users", UserController::class);
    });
});
