<?php

namespace Database\Seeders;

use App\Models\Tienda;
use App\Models\User;
use Illuminate\Database\Seeder;

class TiendaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::where('rol','<>',1)->where('rol','<>',0)->get()->random(10);

        foreach ($users as $user) {
            Tienda::factory(1)->create([
                'user_id' => $user->id,
                'ciudad_id' => 1,
                'estado' => '1'
            ]);
            $user->rol = '2';
            $user->save();
        }
    }
}
