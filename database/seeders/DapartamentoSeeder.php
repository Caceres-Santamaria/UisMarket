<?php

namespace Database\Seeders;

use App\Models\Ciudad;
use App\Models\Departamento;
use Illuminate\Database\Seeder;

class DapartamentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Departamento::factory(8)->create()->each(function(Departamento $departamento){
            Ciudad::factory(5)->create([
                'departamento_id' => $departamento->id
            ]);
        });
    }
}
