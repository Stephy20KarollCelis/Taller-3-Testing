<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Fruta;



class FrutaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = Fruta::class;
    
    public function definition(): array
    {
        return [
            'nombre' => $this->faker->word,
            'color' => $this->faker->safeColorName,
            'precio' => $this->faker->randomFloat(2, 0, 100),
        ];
    }
}


