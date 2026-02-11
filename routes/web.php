<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarrosController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\AluguelController;
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
Route::get('/', [ClienteController::class, 'index'])->name('layouts.index');

Route::get('/cliente', [ClienteController::class, 'index'])->name('cliente.index');
Route::get('/cliente/create', [ClienteController::class, 'create'])->name('cliente.create');


Route::post('/cliente', [ClienteController::class, 'store'])->name('cliente.store');
Route::get('/cliente/{id}', [ClienteController::class, 'show'])->name('cliente.show');
Route::get('/cliente/{id}/edit', [ClienteController::class, 'edit'])->name('cliente.edit');
Route::put('/cliente/{id}', [ClienteController::class, 'update'])->name('cliente.update');
Route::delete('/cliente/{id}', [ClienteController::class, 'destroy'])->name('cliente.destroy');

// Listagem de aluguéis
Route::get('/aluguel', [AluguelController::class, 'index'])->name('aluguel.index');

// Formulário de criação
Route::get('/aluguel/create', [AluguelController::class, 'create'])->name('aluguel.create');

// Salvar novo aluguel
Route::post('/aluguel', [AluguelController::class, 'store'])->name('aluguel.store');

// Mostrar um aluguel específico (atualmente vazio no seu controller)
Route::get('/aluguel/{aluguel}', [AluguelController::class, 'show'])->name('aluguel.show');

// Formulário de edição
Route::get('/aluguel/{aluguel}/edit', [AluguelController::class, 'edit'])->name('aluguel.edit');

// Atualizar dados
Route::put('/aluguel/{aluguel}', [AluguelController::class, 'update'])->name('aluguel.update');

// Excluir aluguel
Route::delete('/aluguel/{aluguel}', [AluguelController::class, 'destroy'])->name('aluguel.destroy');