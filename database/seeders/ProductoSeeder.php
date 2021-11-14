<?php

namespace Database\Seeders;

use App\Models\ImagenProducto;
use App\Models\Producto;
use Illuminate\Database\Seeder;

class ProductoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Producto::factory(150)->create()->each(function(Producto $producto){
            ImagenProducto::factory(4)->create([
                'prioridad' => 1,
                'imagen_tabla_id' => $producto->id,
                'imagen_tabla_tipo' => Producto::class
            ]);
        });
    }
}
