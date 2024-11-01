<?php

use App\Exports\Pro;
use App\Exports\ProductosExport;
use App\Http\Controllers\ProductoController;
use Illuminate\Support\Facades\Route;
use Maatwebsite\Excel\Facades\Excel;

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

    Route::get('productos/export/', function () {
        return Excel::download(new ProductosExport, 'productos.xlsx');
    })->name('productos.export');

    Route::controller(ProductoController::class)->group(function () {
        Route::get('/', 'productos')->name('productos.get');
        Route::post('dashboard', 'store')->name('productos.post');
    });
});

