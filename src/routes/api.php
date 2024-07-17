<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/comments', [\App\Http\Controllers\CommentController::class, 'store'])->middleware('auth:sanctum');
Route::get('/comments', [\App\Http\Controllers\CommentController::class, 'index'])->middleware('auth:sanctum');

Route::post('/answers', [\App\Http\Controllers\AnswerController::class, 'store'])->middleware('auth:sanctum');

Route::post('/register', [\App\Http\Controllers\AuthController::class, 'register']);
Route::post('/login', [\App\Http\Controllers\AuthController::class, 'login']);
Route::get('/logout', [\App\Http\Controllers\AuthController::class, 'logout'])->middleware('auth:sanctum');
