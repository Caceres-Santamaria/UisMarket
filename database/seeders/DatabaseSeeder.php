<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        Storage::deleteDirectory('images/categorias');
        Storage::deleteDirectory('images/tiendas');
        Storage::deleteDirectory('images/productos');

        Storage::makeDirectory('images/categorias');
        Storage::makeDirectory('images/tiendas');
        Storage::makeDirectory('images/productos');

        $this->call(CategoriaSeeder::class);
        $this->call(DapartamentoSeeder::class);
        $this->call(ColorSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(TiendaSeeder::class);
        $this->call(ProductoSeeder::class);
        $this->call(TallaSeeder::class);
        $this->call(ColorProductoSeeder::class);
        $this->call(ColorTallaSeeder::class);
    }
}
