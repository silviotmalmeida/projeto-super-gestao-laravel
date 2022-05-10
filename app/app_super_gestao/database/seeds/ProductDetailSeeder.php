<?php

use Illuminate\Database\Seeder;

// importando as models
use App\ProductDetail;

class ProductDetailSeeder extends Seeder
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

            // sorteando os dados
            $lenght = rand(1, 999)/100;
            $width = rand(1, 999)/100;
            $height = rand(1, 999)/100;

            // criando o objeto e salvando no BD
            ProductDetail::create([
                'lenght' => $lenght,
                'width' => $width,
                'height' => $height,
                'product_id' => $i,
                'unit_id' => 2
            ]);
        }
    }
}
