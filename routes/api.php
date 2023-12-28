<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProductsContoller;
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


Route::get('product',[ProductsContoller::class , 'index']);
Route::post('product',[ProductsContoller::class , 'store']);
Route::get('product/{id}',[ProductsContoller::class , 'show']);
Route::get('product/{id}/edit',[ProductsContoller::class , 'edit']);
Route::put('product/{id}/edit',[ProductsContoller::class , 'update']);
Route::delete('product/{id}/delete',[ProductsContoller::class , 'delete']);