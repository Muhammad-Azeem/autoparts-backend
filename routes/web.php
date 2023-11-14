<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\admin\AddProductController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\SubCategoryController;
use App\Http\Controllers\admin\AddVehicleController;

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
    Route::match(['get', 'post'], '/product-list', [AddProductController::class, 'ProductList'])->name('productList');

    Route::match(['get', 'post'], '/add-category', [CategoryController::class, 'AddCategory'])->name('addCategory');
    Route::match(['get', 'post'], '/category-list', [CategoryController::class, 'CategoryList'])->name('categoryList');

    Route::match(['get', 'post'], '/add-subcategory', [SubCategoryController::class, 'AddSCategory'])->name('addSubCategory');
    Route::match(['get', 'post'], '/subcategory-list', [SubCategoryController::class, 'SCategoryList'])->name('subcategoryList');

    Route::match(['get', 'post'], '/orders', [AdminController::class, 'orders'])->name('order');

    Route::match(['get', 'post'], '/add-vehicle', [AddVehicleController::class, 'AddV'])->name('addVehicle');
    Route::match(['get', 'post'], '/vehicle-list', [AddVehicleController::class, 'ShowV'])->name('vehicleList');

    Route::match(['get', 'post'], '/customers', [AdminController::class, 'customers'])->name('customers');
});


