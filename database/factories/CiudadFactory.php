<?php

namespace Database\Factories;

use App\Models\Ciudad;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CiudadFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Ciudad::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $nombre = $this->faker->word();
        return [
            'nombre' => $nombre,
            'slug' => Str::slug($nombre)
        ];
    }
}
