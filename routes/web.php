<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::resource('products', ProductController::class)->except([
    'show', 'index'
])->middleware('withAuth');

Route::get('/products', [ProductController::class, 'index'])->name('products.index');

Route::resource('blog', BlogController::class)->except([
    'index', 'show'
])->middleware(['withAuth']);

Route::controller(BlogController::class)->group(function () {
    Route::get('/blog', 'index')->name('blog.index');
    Route::get('/blog/{blog}', 'show')->name('blog.show');
});

// Login
Route::get('login', [AuthController::class, 'index'])->name('login')->middleware('noAuth');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');
Route::post('login', [AuthController::class, 'login'])->name('login');
