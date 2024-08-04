<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Livewire\Home;
use App\Livewire\Post\View\Item;
use App\Livewire\Profile\Home as ProfileHome;

Route::get('/', Home::class)->middleware('auth');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/edit', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/edit', [ProfileController::class, 'destroy'])->name('profile.destroy');


    Route::get('/profile/{user}',ProfileHome::class)->name('profile.home');



});

require __DIR__.'/auth.php';
