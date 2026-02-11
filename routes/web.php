<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarrosController;
use App\Http\Controllers\ClientesController;
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

//Clientes Routes
Route::get('/', [ClienteController::class, 'index'])->name('cliente.index');

Route::get('/clientes', [ClienteController::class, 'index'])->name('cliente.index');
Route::get('/clientes/create', [ClienteController::class, 'create'])->name('cliente.create');

Route::post('/cclientes', [ClienteController::class, 'store'])->name('cliente.store');
Route::get('/clientes/{id}', [ClienteController::class, 'show'])->name('cliente.show');
Route::get('/clientes/{id}/edit', [ClienteController::class, 'edit'])->name('cliente.edit');
Route::put('/clientes/{id}', [ClienteController::class, 'update'])->name('cliente.update');
Route::delete('/clientes/{id}', [ClienteController::class, 'destroy'])->name('cliente.destroy');