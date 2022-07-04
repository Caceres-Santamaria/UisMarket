<?php

namespace Database\Seeders;

use App\Models\Color;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ColorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $colores = [
            'rojo' => 'bg-red-600',
            'naranja' => 'bg-orange-500',
            'vinotinto' => 'bg-red-900',
            'rosado' => 'bg-rose-200',
            'lila' => 'bg-purple-300',
            'morado' => 'bg-purple-800',
            'azul'=> 'bg-blue-600',
            'celeste' => 'bg-blue-100',
            'esmeralda' => 'bg-emerald-500',
            'turquesa' => 'bg-cyan-300',
            'verde' => 'bg-green-500',
            'lima' => 'bg-lime-400',
            'amarillo' => 'bg-yellow-300',
            'marrón' => 'bg-yellow-900',
            'blanco' => 'bg-white',
            'negro' => 'bg-black',
            'gris' => 'bg-gray-500',
            'magenta' => 'bg-pink-400',
            'fucsia' => 'bg-pink-500',
            'plateado' => 'bg-slate-200',
            'dorado' => 'bg-yellow-600',
            'mostaza' => 'bg-amber-600',
            'beige' => 'bg-orange-50',
            'mix' => 'mix',
        ];

        foreach ($colores as $clave => $valor) {
            Color::create([
                'nombre' => $clave,
                'slug' => Str::slug($clave),
                'codigo' => $valor
            ]);
        }
    }
}
