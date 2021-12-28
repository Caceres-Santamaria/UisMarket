<?php

namespace Database\Seeders;

use App\Models\Producto;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Seeder;

class ColorProductoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $productos = Producto::where('color', true)->get();

        foreach ($productos as $producto)
        {
            $producto->colores()->attach([
                1 => [
                    'cantidad' => 15
                ],
                2 => [
                    'cantidad' => 15
                ],
                3 => [
                    'cantidad' => 15
                ],
                4 => [
                    'cantidad' => 15
                ],
                5 => [
                    'cantidad' => 15
                ]
            ]);
        }
    }
}
