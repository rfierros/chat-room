<?php

use App\Http\Controllers\MensajeController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');


Route::get('messages', [MensajeController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('mensajes');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';
