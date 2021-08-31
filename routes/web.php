<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\politicaController;
use App\Http\Controllers\aboutController;
use App\Http\Controllers\TTController;
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