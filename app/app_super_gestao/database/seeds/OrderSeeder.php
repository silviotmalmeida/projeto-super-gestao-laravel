<?php

use Illuminate\Database\Seeder;

// importando as models
use App\Order;
use App\Client;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // consultando o valor do último cliente cadastrado
        $client_range = Client::max('id');

        // laço para criação dos dados
        for ($i = 1; $i <= 50; $i++) {

            // sorteando um cliente
            $client_id = rand(1, $client_range);

            // criando o objeto e salvando no BD
            Order::create([
                'client_id' => $client_id,
            ]);
        }
    }
}
