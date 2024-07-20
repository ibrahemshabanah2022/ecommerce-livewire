<?php

use App\Livewire\Products;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Livewire\Cart;
use App\Livewire\ProductsByCategory;
use App\Livewire\ProductSearch;
use App\Livewire\SearchResults;
// Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::post('/logout', function () {
    Auth::logout();
    return redirect('/');
})->name('logout');

Route::get('/', Products::class)
    ->name('products_page');


Route::get('/cart', Cart::class)->name('cart');


Route::get('/category/{id}', ProductsByCategory::class)->name('category.show');




Route::get('/search', ProductSearch::class)->name('search');
Route::get('/search-results/{query}', SearchResults::class)->name('search.results');

require __DIR__ . '/auth.php';
