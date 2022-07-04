<?php

namespace Database\Seeders;

use App\Models\Direccion;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Alexis Cáceres',
            'email' => 'nelsonalexiscacerzcarreo37@gmail.com',
            'rol' => '0',
            'password' => bcrypt('Flaminio1098818855'),
        ]);

        // Direccion::factory(1)->create([
        //     'usuario_id' => $user->id
        // ]);

        $user2 = User::create([
            'name' => 'Jenny Santamaría',
            'email' => 'jennysantamaria06@gmail.com',
            'rol' => '1',
            'password' => bcrypt('6330557Jenny'),
        ]);

        // Direccion::factory(1)->create([
        //     'usuario_id' => $user2->id
        // ]);

        // User::factory(30)->create()->each(function(User $usuario){
        //     Direccion::factory(1)->create([
        //         'usuario_id' => $usuario->id
        //     ]);
        // });
    }
}
