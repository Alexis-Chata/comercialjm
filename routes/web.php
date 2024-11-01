<?php

use App\Http\Controllers\ProductoController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::controller(ProductoController::class)->group(function () {
    Route::get('/', 'productos')->name('productos.get');
    Route::post('dashboard', 'store')->name('productos.post');
});
