<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TiendasController extends Controller
{
  public $modal = false;
  public $tienda = null;
  public function index()
  {
    return view('admin.tiendas');
  }
}
