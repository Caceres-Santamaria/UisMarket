<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ClientesController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\ComentariosController;
use App\Http\Livewire\Admin\CrearCategoria;
use App\Http\Livewire\Admin\CrearAdministrador;
use App\Http\Livewire\Admin\SolicitudesContenedor;

Route::get('/', [HomeController::class, 'index'])->name('admin.dashboard');

Route::view('/profile', 'admin.profile')->name('admin.profile');

Route::get('clientes', [ClientesController::class, 'index'])->name('admin.clientes');

Route::get('solicitudes', SolicitudesContenedor::class)->name('admin.solicitudes');

Route::view('tiendas', 'admin.tiendas')->name('admin.tiendas');
Route::view('tiendas/suspendidas', 'admin.tiendas-suspendidas')->name('admin.tiendas.suspendidas');

Route::get('comentarios/{tienda}',[ComentariosController::class,'index'])->name('admin.comentarios');

Route::get('categorias', CrearCategoria::class)->name('admin.categorias');

Route::get('administradores', CrearAdministrador::class)->name('admin.administradores')->middleware('super.admin');;

// Route::get('administradores',[AdministradoresController::class,'index'])->name('admin.administradores');

Route::view('productos', 'admin.productos')->name('admin.productos');
Route::view('productos/suspendidos', 'admin.productos-suspendidos')->name('admin.productos.suspendidos');
