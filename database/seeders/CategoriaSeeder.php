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
                'slug' => Str::slug('Ropa'),
                'color' => true,
                'talla' => true
            ],
            [
                'nombre' => 'Calzado',
                'slug' => Str::slug('Calzado'),
                'color' => true,
                'talla' => true
            ],

            [
                'nombre' => 'Alimentos',
                'slug' => Str::slug('Alimentos'),
                'color' => false,
                'talla' => false
            ],

            [
                'nombre' => 'Joyas y accesocios',
                'slug' => Str::slug('Joyas y accesocios'),
                'color' => true,
                'talla' => false
            ],

            [
                'nombre' => 'Salud y belleza',
                'slug' => Str::slug('Salud y belleza'),
                'color' => false,
                'talla' => false
            ],

            [
                'nombre' => 'Mascotas',
                'slug' => Str::slug('Mascotas'),
                'color' => true,
                'talla' => true
            ],

            [
                'nombre' => 'Hogar y decoración',
                'slug' => Str::slug('Hogar y decoración'),
                'color' => true,
                'talla' => false
            ],

            [
                'nombre' => 'Arte y cultura',
                'slug' => Str::slug('Arte y cultura'),
                'color' => true,
                'talla' => false
            ],

            [
                'nombre' => 'Papelería',
                'slug' => Str::slug('Papelería'),
                'color' => true,
                'talla' => true
            ],

            [
                'nombre' => 'Accesorios electrónicos',
                'slug' => Str::slug('Accesorios electrónicos'),
                'color' => true,
                'talla' => false
            ],
        ];

        foreach ($categorias as $categoria) {
            Categoria::factory(1)->create($categoria);
        }
    }
}
