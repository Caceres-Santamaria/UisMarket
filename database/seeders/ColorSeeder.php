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
        $colores = ['blanco', 'azul', 'rojo', 'negro', 'gris'];

        foreach ($colores as $color) {
            Color::create([
                'nombre' => $color,
                'slug' => Str::slug($color)
            ]);
        }
    }
}
