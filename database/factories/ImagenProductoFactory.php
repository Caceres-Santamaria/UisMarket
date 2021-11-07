<?php

namespace Database\Factories;

use App\Models\ImagenProducto;
use Illuminate\Database\Eloquent\Factories\Factory;

class ImagenProductoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ImagenProducto::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'url' => 'images/productos/' . $this->faker->image('public/storage/images/productos', 640, 640, 'food', false,true,'Faker')
        ];
    }
}
