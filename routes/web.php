<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function(){
    Route::get('/posts', [PostController::class, 'index'])->name('post_index');
    Route::get('/add-post', [PostController::class, 'create'])->name('post_create');
    Route::post('/add-post', [PostController::class, 'store'])->name('post_store');
    Route::get('/edit-post/{id}', [PostController::class, 'edit'])->name('post_edit');
    Route::post('/edit-post/{id}', [PostController::class, 'update'])->name('post_update');
    Route::get('/delete-post/{id}', [PostController::class, 'destroy'])->name('post_delete');
});
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
