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
        Producto::factory(100)->create()->each(function(Producto $producto){
            ImagenProducto::factory(3)->create([
                'prioridad' => 1,
                'imagen_tabla_id' => $producto->id,
                'imagen_tabla_type' => Producto::class
            ]);
        });
    }
}
