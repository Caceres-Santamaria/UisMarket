<?php

namespace Database\Seeders;

use App\Models\Ciudad;
use App\Models\Departamento;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DapartamentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Departamento::factory(8)->create()->each(function(Departamento $departamento){
        //     Ciudad::factory(5)->create([
        //         'departamento_id' => $departamento->id
        //     ]);
        // });

        $Departamento = Departamento::create([
            'nombre' => 'Santander',
            'slug' => Str::slug('Santander'),
        ]);

        $ciudades = ['Bucaramanga','Giron','Piedecuesta','Floridablanca'];
        for($i = 0;$i<count($ciudades);$i++){
            Ciudad::create([
                'nombre' => $ciudades[$i],
                'slug' => Str::slug($ciudades[$i]),
                'departamento_id' => $Departamento->id
            ]);
        }
    }
}
