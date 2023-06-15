<?php

use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\JWTAuthController;
use App\Http\Controllers\ProducCategoryController;
use App\Http\Controllers\ProductController;

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

// Route::group(['middlewere'=>'api','prefix'=>'auth'], function($router){
//     Route::post('/register',[AuthController::class,'register']);
//     Route::post('/login',[AuthController::class,'login']);
// });

// Route::group([

//     'middleware' => 'api',
//     'prefix' => 'auth'

// ], function ($router) {

//     Route::post('login', 'AuthController@login');
//     Route::post('logout', 'AuthController@logout');
//     Route::post('refresh', 'AuthController@refresh');
//     Route::post('me', 'AuthController@me');

// });
Route::post('register', [JWTAuthController::class, 'register']);
Route::post('login', [JWTAuthController::class, 'login']);

Route::group(['middleware' => 'jwt.verify'], function () {

    Route::post('logout', [JWTAuthController::class, 'logout']);
    Route::get('me', [JWTAuthController::class, 'me']);
    Route::post('store',[ProductController::class,'store']);//
    Route::get('show',[ProductController::class,'show']);
    Route::put('update/{id}',[ProductController::class,'update']);//
    Route::delete('destroy/{id}',[ProductController::class,'destroy']);


    Route::get('product-deteils', [ProductController::class, 'deteils']);
    Route::post('product-deteils-by-id', [ProductController::class, 'deteilsId']);
    Route::post('product-deteils-store', [ProductController::class, 'detstore']);

    Route::get('user-aboute', [UserController::class, 'index']);
    Route::get('categories',[ProducCategoryController::class,'index']);
    Route::get('categories-by-id',[ProducCategoryController::class,'show']);
});
