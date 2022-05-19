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

            // sorteando a quantidade de tipos de produtos no pedido
            $qtd_products = rand(1, 9);

            // laço para criação dos dados
            for ($j = 1; $j <= $qtd_products; $j++) {

                // laço para garantir a unicidade de um tipo de produto no pedido
                do {

                    // inicializando a variável de verificação de existência do tipo de produto no pedido
                    $exists = false;

                    // sorteando o tipo do produto no pedido
                    $product_type = rand(1, $product_range);

                    // obtendo os detalhes do pedido atual
                    $order = Order::find($i);

                    // se o pedido existir
                    if ($order->id) {

                        // iterando sobre a lista de produtos do pedido
                        foreach ($order->product as $product) {

                            // se o tipo do produto sorteado já existir no pedido
                            if ($product->id === $product_type) {

                                // atualizando a variável para repetição do laço 
                                $exists = true;
                            }
                        }
                    }

                    // se existir repetição de tipo, o laço repetirá
                } while ($exists);

                // criando o objeto e salvando no BD
                OrderProduct::create([
                    'order_id' => $i,
                    'product_id' => $product_type,
                    'qtd' => rand(1, 5),
                ]);
            }
        }
    }
}
