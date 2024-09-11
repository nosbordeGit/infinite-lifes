<?php

namespace Database\Factories;

use App\Models\Cliente;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Cartao>
 */
class CartaoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'numero' => $this->faker->creditCardNumber(null, true, ' '),
            'tipo' => $this->faker->creditCardType(),
            'validade' =>$this->faker->creditCardExpirationDate(),
            'cliente_id' => Cliente::pluck('id')->random(),
            'status' => $this->faker->boolean()
        ];
    }
}
