<?php

use Illuminate\Support\Facades\Route;
use Modules\Core\app\Livewire\Products;
use Modules\Core\app\Livewire\Editproduct;
use Modules\Core\app\Livewire\Trashedproducts;
use Modules\Core\app\Http\Controllers\CoreController;
use Modules\Core\app\Livewire\Displayproductsdashboard;
use Modules\Core\Livewire\AdminProducts\AdminProductsPage;
use Modules\Core\app\Http\Controllers\DashboardActionController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group([], function () {
    Route::resource('core', CoreController::class)->names('core');

});

// Route::get('AdminProductsPage', AdminProductsPage::class);
Route::get('AdminProductsPage', Products::class)->name('AdminProductsPage');


Route::get('/products/edit/{productId}', Editproduct::class)->name('edit.product');

Route::get('/trashed-products', Trashedproducts::class)->name('trashed-products');
Route::get('Displayproductsdashboard', Displayproductsdashboard::class)->name('Displayproductsdashboard');

