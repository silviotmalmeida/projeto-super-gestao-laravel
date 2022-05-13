<?php

use Illuminate\Database\Seeder;

// importando as models
use App\Product;
use App\Provider;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // consultando o valor do último fornecedor cadastrado
        $provider_range = Provider::max('id');

        // laço para criação dos dados
        for ($i = 1; $i <= 25; $i++) {

            // sorteando um peso
            $weight = rand(1, 9);

            // sorteando um fornecedor
            $provider_id = rand(1, $provider_range);

            // criando o objeto e salvando no BD
            Product::create([
                'name' => "Produto $i",
                'description' => "Descrição do produto $i",
                'weight' => $weight,
                'unit_id' => 1,
                'provider_id' => $provider_id,
            ]);
        }
    }
}
