<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});



Route::controller(PostController::class)->prefix('/post')->group(function () {
    Route::get('/', 'index')->name('posts.index');
    Route::get('/create', 'create')->name('posts.create');
    Route::post('/', 'store')->name('posts.store');
    Route::get('/{post}', 'show')->name('posts.show');
    Route::get('/{post}/edit', 'edit')->name('posts.edit');
    Route::put('/{post}', 'update')->name('posts.update');
    Route::delete('/{post}', 'destroy')->name('posts.destroy');
});
Route::get('/users', [UserController::class, 'index'])->name('users.index');
