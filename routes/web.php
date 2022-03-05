<?php

use App\Http\Controllers\BackendController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FirstController;
use App\Http\Controllers\CategoryController;

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


// Route::get('/', [FirstController::class,'index'])->name('home');
Route::get('/',[FirstController::class,'index'])->name('home');

Route::get('dashboard',[BackendController::class,'dashboard'])->name('dashboard');

Route::resource('categories',CategoryController::class);
