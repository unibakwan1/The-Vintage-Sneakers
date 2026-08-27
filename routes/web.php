<?php

use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/workshop', [PageController::class, 'workshop'])->name('workshop');
Route::get('/shop', [PageController::class, 'shop'])->name('shop');
Route::get('/events', [PageController::class, 'events'])->name('events');
Route::get('/warranty-card', [PageController::class, 'warrantyCard'])->name('warranty.card');
