<?php

namespace Database\Seeders;

use App\Models\Dimensao;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DimensaoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Dimensao::factory(7)->create();
    }
}
