<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\FavoriteController;

Route::get('/', function() { return redirect('/signup'); });

Route::get('/signup', [AuthController::class, 'showSignup']);
Route::post('/signup', [AuthController::class, 'signup']);
Route::get('/login', [AuthController::class, 'showLogin']);
Route::post('/login', [AuthController::class, 'login']);
Route::get('/logout', [AuthController::class, 'logout']);

Route::middleware('auth')->group(function(){
    Route::get('/home', [CarController::class, 'home']);
    Route::get('/favorites', [FavoriteController::class, 'favorites']);
    Route::post('/favorites/add', [FavoriteController::class, 'add']);
});

Route::middleware(['auth', 'admin'])->group(function() {
    Route::get('/admin', [CarController::class, 'adminIndex']);
    Route::get('/admin/create', [CarController::class, 'adminCreate']);
    Route::get('/admin/redirect', [CarController::class, 'adminRedirect']);
    Route::post('/admin/store', [CarController::class, 'adminStore']);
    Route::get('/admin/edit/{id}', [CarController::class, 'adminEdit']);
    Route::put('/admin/update/{id}', [CarController::class, 'adminUpdate']);
    Route::delete('/admin/delete/{id}', [CarController::class, 'adminDestroy']);
});