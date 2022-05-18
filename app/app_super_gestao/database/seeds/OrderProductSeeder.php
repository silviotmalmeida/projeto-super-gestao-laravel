<?php

use Illuminate\Database\Seeder;

// importando as models
use App\Order;
use App\OrderProduct;
use App\Product;

class OrderProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // consultando o valor do último pedido cadastrado
        $order_range = Order::max('id');

        // consultando o valor do último produto cadastrado
        $product_range = Product::max('id');

        // laço para criação dos dados
        for ($i = 1; $i <= $order_range; $i++) {

            // sorteando a quantidade de produtos no pedido
            $qtd_products = rand(1, 9);

            // laço para criação dos dados
            for ($j = 1; $j <= $qtd_products; $j++) {

                // criando o objeto e salvando no BD
                OrderProduct::create([
                    'order_id' => $i,
                    'product_id' => rand(1, $product_range),
                ]);
            }
        }
    }
}
