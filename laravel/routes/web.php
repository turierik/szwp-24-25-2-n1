<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HouseController;

Route::get('/', [HouseController::class, 'index']) -> name('houses.index');
Route::get('/houses/create', [HouseController::class, 'create']) -> name('houses.create');
Route::get('/houses/{house}', [HouseController::class, 'show']) -> name('houses.show');
Route::post('/houses', [HouseController::class, 'store']) -> name('houses.store');

