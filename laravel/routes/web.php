<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HouseController;

Route::get('/', [HouseController::class, 'index']) -> name('houses.index');
Route::get('/houses/create', [HouseController::class, 'create']) -> name('houses.create');
Route::get('/houses/{house}', [HouseController::class, 'show']) -> name('houses.show');
Route::post('/houses', [HouseController::class, 'store']) -> name('houses.store');
Route::get('/houses/{house}/edit', [HouseController::class, 'edit']) -> name('houses.edit');
Route::patch('/houses/{house}', [HouseController::class, 'update']) -> name('houses.update');
Route::delete('/houses/{house}', [HouseController::class, 'destroy']) -> name('houses.delete');

