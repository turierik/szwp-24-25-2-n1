<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HouseController;
use App\Http\Controllers\ProfileController;

Route::get('/', [HouseController::class, 'index']) -> name('houses.index');
Route::get('/houses/create', [HouseController::class, 'create']) -> name('houses.create');
Route::get('/houses/{house}', [HouseController::class, 'show']) -> name('houses.show');
Route::post('/houses', [HouseController::class, 'store']) -> name('houses.store');
Route::get('/houses/{house}/edit', [HouseController::class, 'edit']) -> name('houses.edit');
Route::patch('/houses/{house}', [HouseController::class, 'update']) -> name('houses.update');
Route::delete('/houses/{house}', [HouseController::class, 'destroy']) -> name('houses.delete');

Route::post('/houses/{house}/add-room', [HouseController::class, 'addRoom']) -> name('houses.addroom');

Route::delete('/houses/{house}/remove-room/{room}', [HouseController::class, 'removeRoom']) -> name('houses.removeroom');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
