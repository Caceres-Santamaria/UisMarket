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
            'blanco' => 'bg-white',
            'azul'=> 'bg-blue-600',
            'rojo' => 'bg-red-600',
            'negro' => 'bg-black',
            'gris' => 'bg-gray-600'
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
