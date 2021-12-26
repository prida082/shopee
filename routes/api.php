<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::get('/product',[\App\Http\Controllers\ProductController::class,'index']);
Route::post('/product/store',[\App\Http\Controllers\ProductController::class,'store']);
Route::get('/product/show/{id}',[\App\Http\Controllers\ProductController::class,'show']);
Route::get('/product/search{name}',[\App\Http\Controllers\ProductController::class,'search']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
