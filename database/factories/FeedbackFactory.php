<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Feedback>
 */
class FeedbackFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'titulo' => $this->faker->word(),
            'status' => $this->faker->randomElement(['Finalizado', 'Aberto']),
            'corpo' => $this->faker->sentence(6),
            'user_id' => User::pluck('id')->random(),
        ];
    }
}
