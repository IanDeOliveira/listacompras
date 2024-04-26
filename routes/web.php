<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProdutosController;

Auth::routes();

//Route::get('/produtos', [ProdutosController::class, 'index']);

Route::prefix('produtos')->group(function () {
    Route::get('/', [ProdutosController::class, 'index'])->name('produtos-index');
    Route::get('/create', [ProdutosController::class, 'create'])->name('produtos-create');
    Route::post('/', [ProdutosController::class, 'store'])->name('produtos-store');
    Route::get('/{id}/edit', [ProdutosController::class, 'edit'])->where('id', '[0-9]+')->name('produtos-edit');
    Route::put('/{id}', [ProdutosController::class, 'update'])->where('id', '[0-9]+')->name('produtos-update');
    Route::delete('/{id}', [ProdutosController::class, 'destroy'])->where('id', '[0-9]+')->name('produtos-destroy');
});

Route::fallback(function () {
    return "Erro!";
});
