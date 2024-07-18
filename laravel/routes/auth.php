<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->post('register', [\App\Http\Controllers\AuthController::class, 'register']);
Route::middleware('guest')->post('login', [\App\Http\Controllers\AuthController::class, 'login']);
Route::middleware('auth')->post('logout', [\App\Http\Controllers\AuthController::class, 'logout']);
Route::middleware('auth')->get('profile', [\App\Http\Controllers\AuthController::class, 'me']);