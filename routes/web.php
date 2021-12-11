<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
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

Route::get('/', [ProductController::class, 'index']);
Route::get('/add-product', [ProductController::class, 'create']);
Route::post('/add-product', [ProductController::class, 'store']);
Route::get('/edit-product/{product}', [ProductController::class, 'edit']);
Route::post('/edit-product/{product}', [ProductController::class, 'update']);
Route::delete('/delete-product/{product}', [ProductController::class, 'delete']);
Route::get('/search', [ProductController::class, 'search']);


Route::get('/category', [CategoryController::class, 'index']);
Route::get('/add-category', [CategoryController::class, 'create']);
Route::post('/add-category', [CategoryController::class, 'store']);

Route::get('/home', function () {
    return view('home');
});
