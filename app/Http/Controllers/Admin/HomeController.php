<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $clientes = User::whereIn('rol', ['2', '3'])->count();
        $tiendas = DB::table('tiendas')
            ->select('estado',DB::raw('count(*) as count'))
            ->whereIn('estado', ['0', '1'])
            ->groupBy('estado')
            ->get();

        $emprendedores = $tiendas->where('estado','1')->first() ? $tiendas->where('estado','1')->first()->count : 0;
        $solicitudes = $tiendas->where('estado','0')->first() ? $tiendas->where('estado','0')->first()->count : 0;
        return view('admin.index', compact('clientes', 'emprendedores', 'solicitudes'));
    }
}
