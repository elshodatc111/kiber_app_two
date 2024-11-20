<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/login', [ApiController::class, 'login']);

Route::middleware('auth:sanctum')->get('/search', [ApiController::class, 'search']);
Route::middleware('auth:sanctum')->get('/search_show/{id}', [ApiController::class, 'search_show']);

Route::post('/search_post', [ApiController::class, 'search_post']);


Route::middleware('auth:sanctum')->get('/child', [ApiController::class, 'child']);
Route::middleware('auth:sanctum')->get('/child_show/{id}', [ApiController::class, 'child_show']);
