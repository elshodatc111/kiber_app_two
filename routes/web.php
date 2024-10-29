<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::post('/create_user', [HomeController::class, 'create_user'])->name('create_user');
Route::post('/create_user_deleted', [HomeController::class, 'create_user_deleted'])->name('create_user_deleted');


Route::get('/region', [HomeController::class, 'region'])->name('region');
Route::get('/substance', [HomeController::class, 'substance'])->name('substance');
Route::get('/search', [HomeController::class, 'search'])->name('search');
Route::get('/chart', [HomeController::class, 'chart'])->name('chart');
