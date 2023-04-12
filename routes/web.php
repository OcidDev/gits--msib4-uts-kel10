<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;

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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/login', [LoginController::class,'index'])->name('login');
Route::post('/login', [LoginController::class, 'auth'])->name('auth');
Route::get('/logout', [LoginController::class,'logout'])->name('logout');
Route::get('/register', [RegisterController::class,'index'])->name('register');
Route::post('/register', [RegisterController::class,'store'])->name('register.store');
Route::get('/', [DashboardController::class,'index'])->middleware('auth');

Route::get('/product', [ProductController::class, 'index'])->name('product')->middleware('auth');
Route::get('/product/add', [ProductController::class, 'create'])->middleware('auth');
Route::get('/product/{id}/edit', [ProductController::class, 'edit']);
Route::get('/product/destroy/{id}', [ProductController::class, 'destroy'])->middleware('auth');

Route::post('/product', [ProductController::class, 'store'])->middleware('auth');
Route::put('/product/{id}',[ProductController::class, 'update'])->middleware('auth');

Route::resource('category', CategoryController::class);
