<?php

use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/houses', [ApiController::class, 'index']);
Route::get('/houses/{house}', [ApiController::class, 'show']);
Route::post('/houses', [ApiController::class, 'store']);
Route::patch('/houses/{house}', [ApiController::class, 'update']);
