<?php

use Illuminate\Database\Seeder;

// importando a model
use App\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // laço para criação dos dados
        for ($i = 1; $i <= 25; $i++) {

            // sorteando um uf
            $weight = rand(1, 9);

            // criando o objeto e salvando no BD
            Product::create([
                'name' => "Produto $i",
                'description' => "Descrição do produto $i",
                'weight' => $weight,
                'unit_id' => 1
            ]);
        }
    }
}
