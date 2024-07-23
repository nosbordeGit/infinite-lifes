<?php

namespace Database\Factories;

use App\Models\Genero;
use App\Models\Vendedor;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Livro>
 */
class LivroFactory extends Factory
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
            'resumo' => $this->faker->text(40),
            'quantidade_paginas' => $this->faker->random_int(1, 2000),
            'autor' => $this->faker->name(null),
            'valor' => $this->faker->randomFloat(2, 1, 8888),
            'estoque' => $this->faker->random_int(1, 1000),
            'isbn13' => $this->faker->isbn13(),
            'idioma' => $this->faker->randomElement(['Português', 'Inglês', 'Espanhol']),
            'edicao' => $this->faker->word(),
            'editora' => $this->faker->company(),
            'dimensao' => $this->faker->word(),
            'idade' => $this->faker->random_int(1, 18),
            'data_publicacao' => $this->faker->date(),
            'imagem' => $this->faker->imageUrl(400, 400, 'books', true, 'book', 'jpg'),
            'genero_id' => Genero::pluck('id')->random(),
            'vendedor_id' => Vendedor::pluck('id')->random
        ];
    }
}
