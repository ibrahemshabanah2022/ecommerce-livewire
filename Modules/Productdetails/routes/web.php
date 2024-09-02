<?php

use Illuminate\Support\Facades\Route;
use Modules\Productdetails\app\Livewire\Productdetails;
use Modules\Productdetails\app\Http\Controllers\ProductdetailsController;

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
    Route::resource('productdetails', ProductdetailsController::class)->names('productdetails');
});

Route::get('/products/{id}', Productdetails::class)->name('product.details');
