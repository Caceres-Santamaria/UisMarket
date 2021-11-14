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
            'slug' => Str::slug('Alexis Cáceres'),
            'email' => 'alexis@gmail.com',
            'password' => bcrypt('12345'),
            'ciudad_id' => 1
        ]);

        Direccion::factory(1)->create([
            'usuario_id' => $user->id
        ]);

        User::factory(100)->create()->each(function(User $usuario){
            Direccion::factory(1)->create([
                'usuario_id' => $usuario->id
            ]);
        });
    }
}
