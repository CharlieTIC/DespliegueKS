<?php


use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoriaController;
use App\Http\Controllers\Admin\ProductoController;
use Gloudemans\Shoppingcart\Facades\Cart;
use \App\Http\Controllers\CartController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;



// Ruta de inicio
Route::get('/', [WelcomeController::class, 'index']) ->name('welcome.index');

// Ruta para mostrar productos y categorias de productos
//Route::get('productos/{producto}', [\App\Http\Controllers\Admin\ProductoController::class, 'show'])->name('producto.show');
//Route::get('categorias/{categoria}', [\App\Http\Controllers\Admin\CategoriaController::class, 'show'])->name('categorias.show');
Route::get('producto', ProductoController::class);

//Ruta controlador del carrito de compra
Route::get('cart', [CartController::class,'index'])->name('cart.index');


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/test-upload', function () {
    return view('livewire.test-upload');
});

// Ruta para instanciar un carrito de compras
Route::get('prueba', function(){
    
    Cart::instance('compra');
    return Cart::content();

Route::get('/test-upload', function () {
    return view('livewire.test-upload');
});

});
