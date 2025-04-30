<?php

use App\Http\Controllers\NoteController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/* Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
 */

Route::get('/', function() {
    return response()->json([
        'message' => 'Prueba Tecnica - API de Notas',
        'desarrollado por' => 'Vladimir Faundez'
    ]);
})->name('api.welcome');

Route::prefix('notes')->group( function() {
    Route::get('/', [NoteController::class, 'index'])->name('notes.index');
    Route::get('/{note}', [NoteController::class, 'show'])->name('notes.show');
    Route::post('/', [NoteController::class, 'store'])->name('notes.store');
    Route::delete('/{note}', [NoteController::class, 'destroy'])->name('notes.destroy');
});