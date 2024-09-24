<?php

namespace Database\Factories;

use App\Models\Administrador;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Dimensao>
 */
class DimensaoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'administrador_id' => Administrador::pluck('id')->random(),
            'valor' => $this->faker->unique()->randomElement(['125 x 180 mm', '110 x 180 mm',
                                                    '140 x 210 mm', '160 x 230 mm',
                                                    '210 x 280 mm', '245 x 300 mm',
                                                    '200 x 200 mm'])
        ];
    }
}
