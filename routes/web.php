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
});

Route::prefix('categorias')->group(function(){
    Route::get('/', [CategoriasController::class, 'index'])->name('categoria.index');
});

Route::prefix('movimentos')->group(function(){
    Route::get('/', [MovimentosController::class, 'index'])->name('movimento.index');
});