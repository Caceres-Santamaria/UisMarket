<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\politicaController;
use App\Http\Controllers\aboutController;
use App\Http\Controllers\TTController;
use App\Http\Controllers\promoController;
use App\Http\Controllers\detalleProdController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\tiendasController;
use App\Http\Controllers\detalleTiendaController;
use App\Http\Controllers\carritoController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\crear_pedidoController;
use App\Http\Controllers\HomeController;
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

Route::get('politicapriv', [politicaController::class,'index'])->name('politicas');

Route::get('about', [aboutController::class,'index'])->name('about');

Route::get('TT', [TTController::class,'index'])->name('TyT');

Route::get('promociones', [promoController::class,'index'])->name('promociones');

Route::get('detalleProducto', [detalleProdController::class,'index'])->name('detalleProd');

Route::get('productos', [ProductoController::class,'index'])->name('productos.index');
Route::get('productos/{producto}', [ProductoController::class,'show'])->name('productos.show');

Route::get('tiendas', [tiendasController::class,'index'])->name('tiendas');
Route::get('tiendas/{tienda}', [tiendasController::class,'show'])->name('tiendas.show');

Route::get('products', function(){
    return view('productos');
});

Route::get('carrito', [carritoController::class,'index'])->name('carrito');

Route::get('crear_pedido', [crear_pedidoController::class,'index'])->name('crear_pedido');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
