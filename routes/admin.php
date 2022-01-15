<?php

use App\Http\Controllers\admin\ClientesController;
use App\Http\Controllers\admin\TiendasController;
use App\Http\Controllers\admin\CategoriasController;
use App\Http\Controllers\admin\AdministradoresController;
use App\Http\Controllers\admin\ProductosController;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Livewire\Admin\CrearCategoria;
use App\Http\Livewire\Admin\CrearAdministrador;

Route::get('/',[HomeController::class,'index'])->name('admin.dashboard');

Route::get('clientes',[ClientesController::class,'index'])->name('admin.clientes');

Route::get('tiendas',[TiendasController::class,'index'])->name('admin.tiendas');

Route::get('categorias',CrearCategoria::class)->name('admin.categorias');

Route::get('administradores',CrearAdministrador::class)->name('admin.administradores');

// Route::get('administradores',[AdministradoresController::class,'index'])->name('admin.administradores');

Route::get('productos',[ProductosController::class,'index'])->name('admin.productos');
