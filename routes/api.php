<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{TaskController, UserController};

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::apiResource('tasks', TaskController::class);
Route::post('users/{user}/assign-task', [UserController::class, 'assignTask']);
Route::get('users', [UserController::class, 'index']);
Route::post('users', [UserController::class, 'store']);
