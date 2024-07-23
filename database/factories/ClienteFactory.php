<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Cliente>
 */
class ClienteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nome' => $this->faker->firstName(null),
            'sobrenome' => $this->faker->lastName(null),
            'cpf' => $this->faker->randomNumber(9, true),
            'data_nascimento' => $this->faker->date(),
            'user_id' => User::pluck('id')->random()
        ];
    }
}
