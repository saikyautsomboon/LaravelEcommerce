<?php
use App\Http\Controllers\BackendController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FirstController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\SubcategoryController;
use App\Http\Controllers\ItemController;
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

Route::get('/',[FirstController::class,'index'])->name('home');

Route::get('dashboard',[BackendController::class,'dashboard'])->name('dashboard');
// route for backend
Route::resource('categories',CategoryController::class);
Route::resource('brands',BrandController::class);
Route::resource('subcategories',SubcategoryController::class);
Route::resource('items',ItemController::class);
// end route for backend
Auth::routes();
// auth home page
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// end auth home page
