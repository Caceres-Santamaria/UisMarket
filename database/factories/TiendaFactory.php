<?php

namespace Database\Factories;

use App\Models\Tienda;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class TiendaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Tienda::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $nombre = $this->faker->sentence($nbWords = 2, $variableNbWords = true);
        return [
            'nombre' => $nombre,
            'slug' => Str::slug($nombre),
            'descripcion' => $this->faker->paragraph(),
            'logo' => 'images/tiendas/' . $this->faker->image('public/storage/images/tiendas', 480, 480, 'fashion', false,true,'Faker'),
            'fondo_img' => 'images/tiendas/' . $this->faker->image('public/storage/images/tiendas', 800, 400, 'abstract', false,true,'Faker'),
            'direccion' => $this->faker->address(),
            'telefono' => $this->faker->e164PhoneNumber(),
            'recoger_tienda' => $this->faker->randomElement($array = array ('true','false')) == 'true' ? true : false,
            'email' => $this->faker->email(),
            'facebook' => 'https://www.facebook.com',
            'whatsapp' => 'https://api.whatsapp.com/send/?phone=573232335276',
            'instagram' => 'https://www.instagram.com/'
        ];
    }
}
