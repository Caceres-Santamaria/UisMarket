<?php

namespace Database\Seeders;

use App\Models\Categoria;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categorias = [
            [
                'nombre' => 'Ropa',
                'slug' => Str::slug('Ropa')
            ],
            [
                'nombre' => 'Calzado',
                'slug' => Str::slug('Calzado')
            ],

            [
                'nombre' => 'Alimentos',
                'slug' => Str::slug('Alimentos')
            ],

            [
                'nombre' => 'Joyas y accesorios',
                'slug' => Str::slug('Joyas y accesorios')
            ],

            [
                'nombre' => 'Salud y belleza',
                'slug' => Str::slug('Salud y belleza')
            ],

            [
                'nombre' => 'Mascotas',
                'slug' => Str::slug('Mascotas')
            ],

            [
                'nombre' => 'Hogar y decoración',
                'slug' => Str::slug('Hogar y decoración')
            ],

            [
                'nombre' => 'Arte y cultura',
                'slug' => Str::slug('Arte y cultura')
            ],

            [
                'nombre' => 'Papelería',
                'slug' => Str::slug('Papelería')
            ],

            [
                'nombre' => 'Tecnología',
                'slug' => Str::slug('Tecnología')
            ],

            [
                'nombre' => 'Servicios',
                'slug' => Str::slug('Servicios')
            ],

            [
                'nombre' => 'Productos varios',
                'slug' => Str::slug('Productos varios')
            ],
        ];

        foreach ($categorias as $categoria) {
            Categoria::factory(1)->create($categoria);
        }
    }
}
