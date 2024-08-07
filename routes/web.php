<?php

use App\Livewire\Cart;
use App\Livewire\Products;
use App\Livewire\ProductSearch;
use App\Livewire\SearchResults;
use App\Livewire\WishlistProducts;
use App\Livewire\ProductsByCategory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\DropdownController;
use App\Http\Controllers\subnitcheckoutController;

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

Route::post('/checkout', [CheckoutController::class, 'checkout'])->name('checkout');

Route::get('/success', [CheckoutController::class, 'success'])->name('checkout.success');
Route::get('/cancel', [CheckoutController::class, 'cancel'])->name('checkout.cancel');






Route::get('/dropdown', [DropdownController::class, 'index'])->name('dropdown');
Route::post('/save-user-order-info', [DropdownController::class, 'saveUserOrderInfo']);
Route::post('/fetch-states', [DropdownController::class, 'fetchState']);
Route::post('/fetch-cities', [DropdownController::class, 'fetchCity']);

Route::get('/subnitcheckout', [subnitcheckoutController::class, 'subnitcheckout'])->name('subnitcheckout');

Route::get('/my-wishlist', WishlistProducts::class)->name('my-wishlist');
// Route::delete('/wishlist/{product}', [WishlistProducts::class, 'destroy'])->name('wishlist.destroy');
Route::delete('/wishlist/{product}', [WishlistProducts::class, 'destroy'])->name('wishlist.destroy');


require __DIR__ . '/auth.php';
