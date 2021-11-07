<?php

namespace Database\Factories;

use App\Models\Ciudad;
use App\Models\Direccion;
use Illuminate\Database\Eloquent\Factories\Factory;

class DireccionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Direccion::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $ciudad = Ciudad::all()->random();
        return [
            'contacto' => $this->faker->name(),
            'telefono' => $this->faker->e164PhoneNumber(),
            'direccion' => $this->faker->address(),
            'especificacion' => $this->faker->secondaryAddress(),
            'ciudad_id' => $ciudad->id,
            'predeterminado' => 1

        ];
    }
}
