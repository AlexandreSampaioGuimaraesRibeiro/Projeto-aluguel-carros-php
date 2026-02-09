<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarrosController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
//Carros Routes
Route::get('/carros', [CarrosController::class, 'index'])->name('carros.index');
Route::get('/carros/create', [CarrosController::class, 'create'])->name('carros.create');

Route::post('/carros', [CarrosController::class, 'store'])->name('carros.store');
Route::get('/carros/{id}', [CarrosController::class, 'show'])->name('carros.show');
Route::get('/carros/{id}/edit', [CarrosController::class, 'edit'])->name('carros.edit');
Route::put('/carros/{id}', [CarrosController::class, 'update'])->name('carros.update');
Route::delete('/carros/{id}', [CarrosController::class, 'destroy'])->name('carros.destroy');