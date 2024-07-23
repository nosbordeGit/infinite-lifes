<?php

namespace Database\Factories;

use App\Models\Carrinho;
use App\Models\Cartao;
use App\Models\Cliente;
use App\Models\Transportadora;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pedido>
 */
class PedidoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'valor' => $this->faker->randomFloat(2, 1 , 9999),
            'status' => $this->faker->randomElement(['Em trânsito', 'Entregue', 'Em avaliação']),
            'carrinho_id' => Carrinho::pluck('id')->random(),
            'cliente_id' => Cliente::pluck('id')->random(),
            'cartao_id' => Cartao::pluck('id')->random(),
            'transportadora_id' => Transportadora::pluck('id')->random()
        ];
    }
}
