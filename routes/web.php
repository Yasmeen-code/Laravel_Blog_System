<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BlogController;
use Illuminate\Support\Facades\Route;


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile/{id}', [ProfileController::class, 'show'])->name('profile.show');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


Route::get('/', [BlogController::class, 'index'])->name('posts.index');
Route::get('/post/{id}', [BlogController::class, 'show'])->name('post.show');
Route::get('/posts/create', [BlogController::class, 'create'])->name('posts.create')->middleware('auth');
Route::post('/posts', [BlogController::class, 'store'])->name('posts.store')->middleware('auth');

Route::post('/posts/{post}/like', [BlogController::class, 'like'])
    ->name('posts.like')
    ->middleware('auth');

