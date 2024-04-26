<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProdutosController;
use App\Http\Controllers\ListasController;

Auth::routes();

Route::middleware('auth')->group(function () {
    Route::get('/', function () {
        return redirect()->route('listas.index');
    });

    Route::prefix("/listas")->group(function () {
        Route::get("/", [ListasController::class, "index"])->name("listas.index");
        Route::post("/", [ListasController::class, "store"])->name("listas.store");
        Route::get("/{lista}/edit", [ListasController::class, "edit"])->where("id", "[0-9]+")->name("listas.edit");
        Route::put("/{lista}", [ListasController::class, "update"])->where("id", "[0-9]+")->name("listas.update");
        Route::delete("/{lista}", [ListasController::class, "destroy"])->where("id", "[0-9]+")->name("listas.destroy");

        Route::prefix("/{lista}/produtos")->group(function () {
            Route::get("/", [ProdutosController::class, "index"])->name("produtos.index");
            Route::get("/create", [ProdutosController::class, "create"])->name("produtos.create");
            Route::post("/", [ProdutosController::class, "store"])->name("produtos.store");
            Route::get("/{produto}/edit", [ProdutosController::class, "edit"])->where("id", "[0-9]+")->name("produtos.edit");
            Route::put("/{produto}", [ProdutosController::class, "update"])->where("id", "[0-9]+")->name("produtos.update");
            Route::delete("/{produto}", [ProdutosController::class, "destroy"])->where("id", "[0-9]+")->name("produtos.destroy");
        });
    });
});
