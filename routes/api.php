<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Return a list of all products
Route::get('/products', [ProductController::class, 'index']);

// Return details of a single product
Route::get('/products/{id}', [ProductController::class, 'show']);

// Create a new product
Route::post('/products/create', [ProductController::class, 'store']);

// Update an existing product
Route::put('/products/update/{id}', [ProductController::class, 'update']);

// Delete a product
Route::delete('/products/delete/{id}', [ProductController::class, 'destroy']);