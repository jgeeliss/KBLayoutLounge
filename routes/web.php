<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KeyboardController;
use App\Http\Controllers\NewsitemController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', HomeController::class)->name('home');
Route::view('/about', 'about')->name('about');

// News routes
Route::get('/news', [NewsitemController::class, 'index'])->name('newsitems.index');
Route::get('/news/{newsitem}', [NewsitemController::class, 'show'])->name('newsitems.show');

// User routes
Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
Route::post('/users', [UserController::class, 'store'])->name('users.store');
Route::post('/users/{user}/toggle-admin', [UserController::class, 'toggleAdmin'])->name('users.toggleAdmin');
Route::get('/users/{user}', [UserController::class, 'show'])->name('users.show');
Route::get('/profile/edit', [UserController::class, 'edit'])->name('users.edit');
Route::put('/profile', [UserController::class, 'update'])->name('users.update');

// Keyboard routes
Route::get('/keyboards', [KeyboardController::class, 'index'])->name('keyboards.index');
Route::get('/keyboards/my-layouts', [KeyboardController::class, 'myLayouts'])->name('keyboards.myLayouts');
Route::get('/keyboard/create', [KeyboardController::class, 'create'])->name('keyboards.create');
Route::post('/keyboards', [KeyboardController::class, 'store'])->name('keyboards.store');
Route::get('/keyboards/{keyboard}', [KeyboardController::class, 'show'])->name('keyboards.show');
Route::get('/keyboards/{keyboard}/edit', [KeyboardController::class, 'edit'])->name('keyboards.edit');
Route::put('/keyboards/{keyboard}', [KeyboardController::class, 'update'])->name('keyboards.update');
Route::delete('/keyboards/{keyboard}', [KeyboardController::class, 'destroy'])->name('keyboards.destroy');

// Rating routes
Route::get('/ratings/my-ratings', [RatingController::class, 'index'])->name('ratings.index');
Route::post('/keyboards/{keyboard}/rate', [RatingController::class, 'store'])->name('keyboards.rate');

// Comment routes
Route::get('/comments/my-comments', [CommentController::class, 'index'])->name('comments.index');
Route::post('/keyboards/{keyboard}/comment', [CommentController::class, 'store'])->name('keyboards.comment');
Route::put('/comments/{comment}', [CommentController::class, 'update'])->name('comments.update');
Route::delete('/comments/{comment}', [CommentController::class, 'destroy'])->name('comments.destroy');

Route::get('/signup', [AuthController::class, 'create'])->name('signup');
Route::post('/signup', [AuthController::class, 'store']);
Route::get('/login', [AuthController::class, 'goToLogin'])->name('login');
Route::post('/login', [AuthController::class, 'storeLogin']);
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
