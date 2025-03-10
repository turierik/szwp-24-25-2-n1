<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HouseController;

Route::get('/', [HouseController::class, 'index']);
Route::get('/houses/{house}', [HouseController::class, 'show']) -> name('houses.show');
