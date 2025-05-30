<?php 

use App\Http\Controllers\Admin\CoverController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoriaController;
use App\Http\Controllers\Admin\SubcategoriaController;
use App\Http\Controllers\Admin\ProductoController;
use App\Models\Cover;
use App\Models\Producto;

Route::get('/admin', function () {
    return view('admin.dashboard');
})->name('dashboard');

// Rutas para la sección de categorias, subcategorias y productos
Route::resource('categorias', CategoriaController::class);
Route::resource('subcategorias', SubcategoriaController::class);
Route::resource('productos', ProductoController::class);

// Rutas para la sección de portada
Route::resource('covers', CoverController::class);