<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\KeyboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', HomeController::class)->name('home');
Route::view('/about', 'about')->name('about');

Route::get('/keyboards', [KeyboardController::class, 'index'])->name('keyboards.index');
Route::get('/keyboards/my-layouts', [KeyboardController::class, 'myLayouts'])->name('keyboards.myLayouts');
Route::get('/keyboards/my-comments', [KeyboardController::class, 'myComments'])->name('keyboards.myComments');
Route::get('/keyboards/my-ratings', [KeyboardController::class, 'myRatings'])->name('keyboards.myRatings');
Route::get('/keyboard/create', [KeyboardController::class, 'create'])->name('keyboards.create');
Route::post('/keyboards', [KeyboardController::class, 'store'])->name('keyboards.store');
Route::get('/keyboards/{keyboard}', [\App\Http\Controllers\KeyboardController::class, 'show'])->name('keyboards.show');
Route::get('/keyboards/{keyboard}/edit', [\App\Http\Controllers\KeyboardController::class, 'edit'])->name('keyboards.edit');
Route::put('/keyboards/{keyboard}', [\App\Http\Controllers\KeyboardController::class, 'update'])->name('keyboards.update');
Route::delete('/keyboards/{keyboard}', [\App\Http\Controllers\KeyboardController::class, 'destroy'])->name('keyboards.destroy');
Route::post('/keyboards/{keyboard}/rate', [\App\Http\Controllers\KeyboardController::class, 'rate'])->name('keyboards.rate');
Route::post('/keyboards/{keyboard}/comment', [\App\Http\Controllers\KeyboardController::class, 'comment'])->name('keyboards.comment');
Route::put('/comments/{comment}', [\App\Http\Controllers\KeyboardController::class, 'updateComment'])->name('comments.update');
Route::delete('/comments/{comment}', [\App\Http\Controllers\KeyboardController::class, 'deleteComment'])->name('comments.destroy');

Route::get('/signup', [\App\Http\Controllers\AuthController::class, 'create'])->name('signup');
Route::post('/signup', [\App\Http\Controllers\AuthController::class, 'store']);
Route::get('/login', [\App\Http\Controllers\AuthController::class, 'goToLogin'])->name('login');
Route::post('/login', [\App\Http\Controllers\AuthController::class, 'storeLogin']);
Route::get('/logout', [\App\Http\Controllers\AuthController::class, 'logout'])->name('logout');
