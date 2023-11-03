<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\admin\AddProductController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::match(['get','post'],'/admin',[AdminAuthController::class,'login_'])->name('login')->middleware(['guest:admin']);

Route::group(['prefix' => '/admin','middleware' => ['auth:admin']],function () {
    Route::match(['get', 'post'], '/dashboard', [AdminController::class, 'index'])->name('dashboard');
    Route::match(['get', 'post'], '/add-product', [AddProductController::class, 'AddProduct'])->name('product');
});


