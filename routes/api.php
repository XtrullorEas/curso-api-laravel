<?php

use App\Http\Controllers\Api\TaskController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('auth/register', [\App\Http\Controllers\Api\AuthController::class, 'register']);
Route::post('auth/login', [\App\Http\Controllers\Api\AuthController::class, 'login']);
Route::post('auth/logout', [\App\Http\Controllers\Api\AuthController::class, 'logout']);
Route::post('auth/refresh', [\App\Http\Controllers\Api\AuthController::class, 'refresh']);
Route::post('auth/me', [\App\Http\Controllers\Api\AuthController::class, 'me']);

Route::apiResource('users', UserController::class);
Route::apiResource('tasks', TaskController::class);

Route::get('prueba', function () {
    return auth('api')->user();
});