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
                'nombre' => 'Joyas y accesocios',
                'slug' => Str::slug('Joyas y accesocios')
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
                'nombre' => 'Accesorios electrónicos',
                'slug' => Str::slug('Accesorios electrónicos')
            ],
        ];

        foreach ($categorias as $categoria) {
            Categoria::factory(1)->create($categoria);
        }
    }
}
