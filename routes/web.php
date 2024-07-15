<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Products;

// Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');



Route::get('/', Products::class);




require __DIR__ . '/auth.php';
