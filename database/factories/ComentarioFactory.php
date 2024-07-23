<?php

namespace Database\Factories;

use App\Models\Cliente;
use App\Models\Livro;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comentario>
 */
class ComentarioFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'corpo' => $this->faker->sentence(6),
            'cliente_id' => Cliente::pluck('id')->random(),
            'livro_id' => Livro::pluck('id')->random()
        ];
    }
}
