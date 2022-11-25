<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\BrandModelController;
use App\Http\Controllers\ClientController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::apiResource('brand', BrandController::class);
Route::apiResource('brand-model', BrandModelController::class);
Route::apiResource('client', ClientController::class);

