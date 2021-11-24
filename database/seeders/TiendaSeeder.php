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
        $users = User::all()->random(30);

        foreach ($users as $user) {
            Tienda::factory(1)->create([
                'user_id' => $user->id,
                'ciudad_id' => $user->ciudad->id
            ]);
        }
    }
}
