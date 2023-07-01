<?php

use App\Http\Controllers\CategoriasController;
use App\Http\Controllers\ContasController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MovimentosController;
use Illuminate\Support\Facades\Route;

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::prefix('login')->group(function(){
    Route::get('/', [LoginController::class, 'index'])->name('login.index');
    Route::post('/', [LoginController::class, 'store'])->name('login.store');
    Route::get('/logout', [LoginController::class, 'destroy'])->name('login.destroy');
});

Route::prefix('contas')->group(function(){
    Route::get('/', [ContasController::class, 'index'])->name('conta.index');
    Route::get('/cadastrarConta', [ContasController::class, 'cadastrarConta'])->name('cadastrar.conta.get');
    Route::post('/cadastrarConta', [ContasController::class, 'cadastrarConta'])->name('cadastrar.conta');
    Route::get('/atualizarConta/{id}', [ContasController::class, 'atualizarConta'])->name('atualizar.conta.get');
    Route::put('/atualizarConta/{id}', [ContasController::class, 'atualizarConta'])->name('atualizar.conta');
    Route::delete('/delete/{id}', [ContasController::class, 'delete'])->name('conta.delete');
});

Route::prefix('categorias')->group(function(){
    Route::get('/', [CategoriasController::class, 'index'])->name('categoria.index');
    Route::get('/cadastrarCategoria', [CategoriasController::class, 'cadastrarCategoria'])->name('cadastrar.categoria.get');
    Route::post('/cadastrarCategoria', [CategoriasController::class, 'cadastrarCategoria'])->name('cadastrar.categoria');
    Route::get('/atualizarCategoria/{id}', [CategoriasController::class, 'atualizarCategoria'])->name('atualizar.categoria.get');
    Route::put('/atualizarCategoria/{id}', [CategoriasController::class, 'atualizarCategoria'])->name('atualizar.categoria');
    Route::delete('/delete/{id}', [CategoriasController::class, 'delete'])->name('categoria.delete');
});

Route::prefix('movimentos')->group(function(){
    Route::get('/', [MovimentosController::class, 'index'])->name('movimento.index');
    Route::get('/cadastrarMovimento', [MovimentosController::class, 'cadastrarMovimento'])->name('cadastrar.movimento.get');
    Route::post('/cadastrarMovimento', [MovimentosController::class, 'cadastrarMovimento'])->name('cadastrar.movimento');
    Route::get('/atualizarMovimento/{id}', [MovimentosController::class, 'atualizarMovimento'])->name('atualizar.movimento.get');
    Route::put('/atualizarMovimento/{id}', [MovimentosController::class, 'atualizarMovimento'])->name('atualizar.movimento');
    Route::delete('/delete/{id}', [MovimentosController::class, 'delete'])->name('movimento.delete');
});