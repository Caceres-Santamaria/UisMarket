<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\politicaController;
use App\Http\Controllers\aboutController;
use App\Http\Controllers\TTController;
use App\Http\Controllers\promoController;
use App\Http\Controllers\detalleProdController;
use App\Http\Controllers\productosController;
use App\Http\Controllers\tiendasController;
use App\Http\Controllers\detalleTiendaController;
use App\Http\Controllers\carritoController;
use App\Http\Controllers\crear_pedidoController;

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

Route::get('/', function () {
    return view('home');
});

Route::get('politicapriv', [politicaController::class,'index'])->name('politicas');

Route::get('about', [aboutController::class,'index'])->name('about');

Route::get('TT', [TTController::class,'index'])->name('TyT');

Route::get('promociones', [promoController::class,'index'])->name('promociones');

Route::get('detalleProducto', [detalleProdController::class,'index'])->name('detalleProd');

Route::get('productos', [productosController::class,'index'])->name('productos');

Route::get('tiendas', [tiendasController::class,'index'])->name('tiendas');


Route::get('detalleTienda', [detalleTiendaController::class,'index'])->name('detalleTien');


Route::get('carrito', [carritoController::class,'index'])->name('carrito');

Route::get('crear_pedido', [crear_pedidoController::class,'index'])->name('crear_pedido');