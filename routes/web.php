<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\KeyboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', HomeController::class)->name('home');
Route::get('/keyboards', [KeyboardController::class, 'index'])->name('keyboards.index');
Route::get('/keyboard/create', [KeyboardController::class, 'create'])->name('keyboards.create');
Route::post('/keyboards', [KeyboardController::class, 'store'])->name('keyboards.store');
Route::get('keyboards/{keyboard}', [\App\Http\Controllers\KeyboardController::class, 'show'])->name('keyboards.show');
