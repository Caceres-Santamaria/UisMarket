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
        Storage::deleteDirectory('public/images/categorias');
        Storage::deleteDirectory('public/images/tiendas');
        Storage::deleteDirectory('public/images/productos');

        Storage::makeDirectory('public/images/categorias');
        Storage::makeDirectory('public/images/tiendas');
        Storage::makeDirectory('public/images/productos');

        $this->call(CategoriaSeeder::class);
        $this->call(DapartamentoSeeder::class);
        $this->call(ColorSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(TiendaSeeder::class);
        $this->call(ProductoSeeder::class);
        $this->call(TallaSeeder::class);
        $this->call(ColorProductoSeeder::class);
        $this->call(ColorTallaSeeder::class);
        $this->call(EnvioSeeder::class);
    }
}
