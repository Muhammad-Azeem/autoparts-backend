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
use App\Http\Controllers\api\GarageController;
use App\Http\Controllers\api\TrackingController;
use App\Http\Controllers\api\VehicleController;
use App\Http\Controllers\api\SubCategoryController;

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


Route::post('signup', [AuthController::class, 'signup']);
Route::post('login', [AuthController::class, 'login']);

Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::get('/check-auth', function (Request $request){
       return 'Authorized';
    });
    Route::post('update', [AuthController::class, 'update']);
    Route::post('changeEmail', [AuthController::class, 'updateEmail']);
    Route::post('updateShipping', [AuthController::class, 'updateShipping']);

    Route::get('category/find/{id}', [CategoryController::class, 'find']);
    Route::post('category/create', [CategoryController::class, 'create']);
    Route::post('category/update/{id}', [CategoryController::class, 'update']);
    Route::post('category/delete/{id}', [CategoryController::class, 'delete']);


    Route::get('sub-category/find/{id}', [SubCategoryController::class, 'find']);
    Route::post('sub-category/create', [SubCategoryController::class, 'create']);
    Route::put('sub-category/update/{id}', [SubCategoryController::class, 'update']);
    Route::delete('sub-category/delete/{id}', [SubCategoryController::class, 'delete']);

    Route::get('cart/find/{id}', [CartController::class, 'find']);
    Route::post('cart/create', [CartController::class, 'create']);
    Route::put('cart/update/{id}', [CartController::class, 'update']);
    Route::delete('cart/delete/{id}', [CartController::class, 'delete']);

    Route::get('address/find/{id}', [AddressController::class, 'find']);
    Route::post('address/create', [AddressController::class, 'create']);
    Route::put('address/update/{id}', [AddressController::class, 'update']);
    Route::delete('address/delete/{id}', [AddressController::class, 'delete']);

    Route::get('order/find/{id}', [OrderController::class, 'find']);
    Route::post('order/create', [OrderController::class, 'create']);
    Route::put('order/update/{id}', [OrderController::class, 'update']);
    Route::delete('order/delete/{id}', [OrderController::class, 'delete']);


    Route::post('product/create', [ProductController::class, 'create']);
    Route::post('product/update/{id}', [ProductController::class, 'update']);
    Route::post('product/delete/{id}', [ProductController::class, 'delete']);


    Route::get('garage/find/{id}', [GarageController::class, 'find']);
    Route::post('garage/create', [GarageController::class, 'create']);
    Route::put('garage/update/{id}', [GarageController::class, 'update']);
    Route::delete('garage/delete/{id}', [GarageController::class, 'delete']);

    Route::get('tracking/find/{id}', [TrackingController::class, 'find']);
    Route::post('tracking/create', [TrackingController::class, 'create']);
    Route::post('tracking/update/{id}', [TrackingController::class, 'update']);
    Route::post('tracking/delete/{id}', [TrackingController::class, 'delete']);

    Route::get('vehicle/find/{id}', [VehicleController::class, 'find']);
    Route::post('vehicle/create', [VehicleController::class, 'create']);
    Route::post('vehicle/update/{id}', [VehicleController::class, 'update']);
    Route::post('vehicle/delete/{id}', [VehicleController::class, 'delete']);

});
Route::get('vehicle/allYears', [VehicleController::class, 'getAllYears']);
Route::get('vehicle/allModels', [VehicleController::class, 'getAllModels']);
Route::get('vehicle/allCompanies', [VehicleController::class, 'getAllCompanies']);
Route::get('vehicle/searchVehicle/{year}/{model}/{company}', [VehicleController::class, 'searchVehicle']);
Route::get('product/getAllProductsByCategory', [CategoryController::class, 'getAllProductsByCategory']);
Route::get('product/getProductsByCategoryId/{categoryId}', [CategoryController::class, 'getProductsByCategory']);
Route::get('product/getProductsBySubCategoryId/{subCategoryId}', [CategoryController::class, 'getProductsBySubCategory']);

Route::get('vehicle/allCategories', [CategoryController::class, 'getAllCategories']);
Route::get('product/allProducts', [ProductController::class, 'getAllProducts']);
Route::get('product/find/{id}', [ProductController::class, 'find']);
