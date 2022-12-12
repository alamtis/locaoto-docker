<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\BrandModelController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\AgencyController;
use App\Http\Controllers\LocationController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::apiResource('brands', BrandController::class);
Route::apiResource('brand-models', BrandModelController::class);
Route::apiResource('clients', ClientController::class);
Route::apiResource('agencies', AgencyController::class);
Route::apiResource('locations', LocationController::class);

