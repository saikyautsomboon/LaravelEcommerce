<?php

use App\Http\Controllers\BackendController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FirstController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\SubcategoryController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', [FirstController::class, 'index'])->name('homepage');
Route::get('productdetail', [FirstController::class, 'productdetail'])->name('productdetailpage');
Route::get('filter/{id}', [FirstController::class, 'filter'])->name('filterpage');
Route::get('shoppingcart', [FirstController::class, 'shoppingcart'])->name('cartpage');
Route::get('orderhistory', [FirstController::class, 'orderhistory'])->name('orderhistorypage');
Route::resource('orders', OrderController::class);
// route for backend

Route::middleware('role:admin')->group(function () {
    Route::get('dashboard', [BackendController::class, 'dashboard'])->name('dashboard');

    Route::resource('categories', CategoryController::class);
    Route::resource('brands', BrandController::class);
    Route::resource('subcategories', SubcategoryController::class);
    Route::resource('items', ItemController::class);
});
// end route for backend
// Email verify
Auth::routes(['verify' => true]);
// End Email Verification
// auth home page
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// end auth home page
