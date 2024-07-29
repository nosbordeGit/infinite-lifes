<?php

namespace Database\Seeders;

use App\Models\Carrinho;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CarrinhoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Carrinho::factory(10)->create();
    }
}
