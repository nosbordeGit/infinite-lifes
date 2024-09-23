<?php

namespace Database\Factories;

use App\Models\Cliente;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Crypt;

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
        $numero = $this->faker->creditCardNumber(null, true, ' ');
        $numero = Crypt::encryptString($numero);

        $validade = $this->faker->creditCardExpirationDate();
        $validade = Crypt::encryptString($validade);
        return [
            'numero' => $numero,
            'tipo' => $this->faker->creditCardType(),
            'validade' => $validade,
            'cliente_id' => Cliente::pluck('id')->random(),
            'status' => $this->faker->boolean()
        ];
    }
}
