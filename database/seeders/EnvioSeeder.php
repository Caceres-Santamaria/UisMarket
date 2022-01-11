<?php

namespace Database\Seeders;

use App\Models\Envio;
use App\Models\Tienda;
use Illuminate\Database\Seeder;

class EnvioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tiendas = Tienda::all();
        foreach($tiendas as $tienda){
            Envio::create([
                'costo' => random_int(3000,10000),
                'ciudad_id' => 1,
                'tienda_id' => $tienda->id
            ]);
            Envio::create([
                'costo' => random_int(3000,10000),
                'ciudad_id' => 2,
                'tienda_id' => $tienda->id
            ]);
            Envio::create([
                'costo' => random_int(3000,10000),
                'ciudad_id' => 3,
                'tienda_id' => $tienda->id
            ]);
        }
    }
}
