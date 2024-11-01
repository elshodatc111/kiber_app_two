<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/login', [ApiController::class, 'login']);

Route::middleware('auth:sanctum')->post('/logout', [ApiController::class, 'logout']);

Route::middleware('auth:sanctum')->get('/alluser', [ApiController::class, 'alluser']);
