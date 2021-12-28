<?php

namespace Database\Seeders;

use App\Models\Producto;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Seeder;

class TallaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $productos = Producto::where('talla', true)->get();

        $tallas = ['XXS', 'XS', 'S', 'M', 'L', 'XL', '2XL', '3XL'];

        foreach ($productos as $producto)
        {
            foreach ($tallas as $talla)
            {
                $producto->tallas()->create(
                [
                    'nombre' => $talla
                ]);
            }
        }
    }
}
