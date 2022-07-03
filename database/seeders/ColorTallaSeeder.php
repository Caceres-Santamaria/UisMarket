<?php

namespace Database\Seeders;

use App\Models\Talla;
use Illuminate\Database\Seeder;

class ColorTallaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tallas = Talla::all();

        foreach ($tallas as $talla) {
            $talla->colores()->attach(
            [
                1 => ['cantidad' => 15],
                2 => ['cantidad' => 15],
                3 => ['cantidad' => 15],
                4 => ['cantidad' => 15],
                5 => ['cantidad' => 15]
            ]);
        }
    }
}
