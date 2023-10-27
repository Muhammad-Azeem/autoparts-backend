<?php

use App\Http\Controllers\api\AddressController;
use App\Http\Controllers\api\OrderController;
use App\Http\Controllers\api\ProductController;
use App\Mail\SampleMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\userController;
use App\Http\Controllers\api\AuthController;
use App\Http\Controllers\api\CategoryController;
use App\Http\Controllers\api\CartController;

use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::post('update', [AuthController::class, 'update']);
    Route::post('category/find/{id}', [CategoryController::class, 'find']);
    Route::post('category/create', [CategoryController::class, 'create']);
    Route::post('category/update', [CategoryController::class, 'update']);
    Route::post('category/delete', [CategoryController::class, 'delete']);

    Route::post('cart/find/{id}', [CartController::class, 'find']);
    Route::post('cart/create', [CartController::class, 'create']);
    Route::post('cart/update', [CartController::class, 'update']);
    Route::post('cart/delete', [CartController::class, 'delete']);

    Route::post('address/find/{id}', [CartController::class, 'find']);
    Route::post('address/create', [AddressController::class, 'create']);
    Route::post('address/update', [AddressController::class, 'update']);
    Route::post('address/delete', [AddressController::class, 'delete']);

    Route::post('orders/find/{id}', [OrderController::class, 'find']);
    Route::post('order/create', [OrderController::class, 'create']);
    Route::post('order/update', [OrderController::class, 'update']);
    Route::post('order/delete', [OrderController::class, 'delete']);

    Route::post('product/find/{id}', [ProductController::class, 'find']);
    Route::post('product/create', [ProductController::class, 'create']);
    Route::post('product/update', [ProductController::class, 'update']);
    Route::post('product/delete', [ProductController::class, 'delete']);




});


Route::post('signup', [AuthController::class, 'signup']);
Route::post('login', [AuthController::class, 'login']);
