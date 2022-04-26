<?php

namespace Database\Factories;

use App\Models\Categoria;
use App\Models\Producto;
use App\Models\Tienda;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProductoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Producto::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $nombre = $this->faker->sentence(2);

        $categoria = Categoria::all()->random();

        $tienda = Tienda::all()->random();

        if(rand(0,1)){
            $color = true;
            $talla = false;
            $cantidad = null;
        }else{
            if(rand(0,1)){
                $color = false;
                $talla = true;
                $cantidad = null;
            }else{
                $color = false;
                $talla = false;
                $cantidad = 15;
            }
        }

        return [
            'nombre' => $nombre,
            'slug' => Str::slug($nombre),
            'descripcion' => $this->faker->text(),
            'precio' => $this->faker->numberBetween($min = 5000, $max = 100000),
            'categoria_id' => $categoria->id,
            'tienda_id' => $tienda->id,
            'estado'=> $this->faker->randomElement($array = array ('nuevo','usado')),
            'publicacion' => 2,
            'cantidad' => $cantidad,
            'color' => $color,
            'talla' => $talla,
            'descuento' => $this->faker->randomFloat(2, 0, 1)
        ];
    }
}
