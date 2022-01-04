<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\politicaController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\TTController;
use App\Http\Controllers\promoController;
use App\Http\Controllers\detalleProdController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\TiendasController;
use App\Http\Controllers\detalleTiendaController;
use App\Http\Controllers\carritoController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\crear_pedidoController;
use App\Http\Controllers\pedidoController;
use App\Http\Controllers\HomeController;
use App\Http\Livewire\CrearProducto;
use App\Http\Livewire\EditarProducto;
use Illuminate\Support\Facades\DB;

// DB::listen(function($query){
//     echo "<pre>{$query->sql}</pre>";
// });
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', [HomeController::class,'index'])->name('home');

Route::get('categorias/{categoria}', [CategoriaController::class, 'show'])->name('categorias.show');

Route::get('politicas', [politicaController::class,'index'])->name('politicas');

Route::get('about', [AboutController::class,'index'])->name('about');

Route::get('terminos&condiciones', [TTController::class,'index'])->name('TyT');

Route::get('detalleProducto', [detalleProdController::class,'index'])->name('detalleProd');

Route::get('productos', [ProductoController::class,'index'])->name('productos.index');
Route::get('productos/promociones', [ProductoController::class,'promociones'])->name('promociones');
Route::get('productos/crear', CrearProducto::class)->name('productos.create');

Route::get('productos/editar', EditarProducto::class)->name('productos.edit');

Route::get('productos/{producto}', [ProductoController::class,'show'])->name('productos.show');

Route::get('tiendas', [TiendasController::class,'index'])->name('tiendas');
Route::get('tiendas/{tienda}', [TiendasController::class,'show'])->name('tiendas.show');

Route::get('products', function(){
    return view('productos');
});

Route::get('carrito', [carritoController::class,'index'])->name('carrito');

Route::get('crear_pedido', [crear_pedidoController::class,'index'])->name('crear_pedido');
Route::get('pedidos', [pedidoController::class, 'index'])->name('pedidos.index');


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');



