<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\ProductController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/test', function (){
    return 'test';
});
Route::post('/login', [AuthController::class,'login']);
Route::post('/logout', [AuthController::class,'logout'])->middleware('auth:sanctum');

// Route::apiResource('/product', [ProductController::class]);
Route::middleware(['auth:sanctum'])->group (function(){
    Route::get('/product', [ProductController::class, 'index']);
    Route::get('/product/{id}', [ProductController::class,'show']);
    Route::post('/product', [ProductController::class,'store']);
    Route::put('/product/{id}', [ProductController::class,'update']);
    Route::delete('/product/{id}', [ProductController::class,'destroy']);

});

// Get all products
    