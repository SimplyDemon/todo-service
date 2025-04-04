<?php

use App\Http\Controllers\SearchController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\TodoController;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;

/* Don't need index page atm */
Route::get('/', [TodoController::class, 'index']);

Route::resource('todos', TodoController::class);
Route::resource('tags', TagController::class);
Route::get('/search', [SearchController::class, 'index'])->name('search');
