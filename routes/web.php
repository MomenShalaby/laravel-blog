<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


// Route::resource('posts', 'PostController');

Route::controller(PostController::class)->prefix('/post')->group(function () {
    Route::get('/', 'index');
    Route::post('/', 'store');
    Route::get('/{post}', 'show');
    Route::put('/{post}', 'update');
    Route::delete('/{post}', 'destroy');
});