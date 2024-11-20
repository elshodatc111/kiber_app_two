<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ChildController;

Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::post('/create_user', [HomeController::class, 'create_user'])->name('create_user');
Route::post('/create_user_deleted', [HomeController::class, 'create_user_deleted'])->name('create_user_deleted');

Route::get('/region', [HomeController::class, 'region'])->name('region');
Route::post('/region_create', [HomeController::class, 'region_create'])->name('region_create');
Route::post('/region_deleted', [HomeController::class, 'region_deleted'])->name('region_deleted');

Route::get('/substance', [HomeController::class, 'substance'])->name('substance');
Route::post('/substance_create', [HomeController::class, 'substance_create'])->name('substance_create');
Route::post('/substance_delete', [HomeController::class, 'substance_delete'])->name('substance_delete');

Route::get('/message', [HomeController::class, 'message'])->name('message');

Route::get('/search', [HomeController::class, 'search'])->name('search');
Route::post('/search_create', [HomeController::class, 'search_create'])->name('search_create');
Route::get('/search_show/{id}', [HomeController::class, 'search_show'])->name('search_show');
Route::post('/search_update', [HomeController::class, 'search_update'])->name('search_update');
Route::post('/search_update_image', [HomeController::class, 'search_update_image'])->name('search_update_image');
Route::post('/search_delete', [HomeController::class, 'search_delete'])->name('search_delete');

Route::get('/chart', [HomeController::class, 'chart'])->name('chart');

Route::get('/child', [ChildController::class, 'child'])->name('child');
Route::post('/child_create', [ChildController::class, 'child_create'])->name('child_create');
Route::post('/child_delete', [ChildController::class, 'child_delete'])->name('child_delete');