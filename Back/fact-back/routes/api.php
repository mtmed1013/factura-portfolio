<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProductsController;
use App\Http\Controllers\Api\ClientsController;
use App\Http\Controllers\Api\FactsController;
use App\Http\Controllers\Api\FactDetailsController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::prefix('products')->group(function () {
    Route::get('/', [ProductsController::class, 'index']);
    Route::get('/{id}', [ProductsController::class, 'show']);
    Route::post('/', [ProductsController::class, 'create']);
    Route::put('/{id}', [ProductsController::class, 'update']);
    Route::delete('/{id}', [ProductsController::class, 'delete']);
});

Route::prefix('clients')->group(function () {
    Route::get('/', [ClientsController::class, 'index']);
    Route::get('/{id}', [ClientsController::class, 'show']);
    Route::post('/', [ClientsController::class, 'create']);
    Route::put('/{id}', [ClientsController::class, 'update']);
    Route::delete('/{id}', [ClientsController::class, 'delete']);
});
Route::prefix('facts')->group(function () {
    Route::get('/{id}', [FactsController::class, 'index']);
    Route::post('/', [FactsController::class, 'create']);
    Route::delete('/{id}', [FactsController::class, 'delete']);
});

Route::prefix('facts-details')->group(function () {
    Route::get('/{id}', [FactDetailsController::class, 'index']);
    Route::post('/', [FactDetailsController::class, 'create']);
    Route::delete('/{id}', [FactDetailsController::class, 'delete']);
});
