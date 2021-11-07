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
        $productos = Producto::whereHas('categoria', function (Builder $query)
        {
            $query->where('color', true)
                ->where('talla', true);
        })->get();

        $tallas = ['Talla XS', 'Talla S', 'Talla M', 'Talla L', 'Talla XL'];

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