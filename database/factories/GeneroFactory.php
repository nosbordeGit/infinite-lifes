<?php

namespace Database\Factories;

use App\Models\Administrador;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Genero>
 */
class GeneroFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'administrador_id' => Administrador::pluck('id')->random,
            'genero' => $this->faker->randomElement(['Romance', 'Ficção', 'Suspense', 'Drama', 'Terror', 'Ação', 'Luta', 'Sci-fi', 'Comédia', 'Educacional'])->unique()
        ];
    }
}
