<?php

use Illuminate\Database\Seeder;

// importando a model
use App\Client;

class ClientSeeder extends Seeder
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

            // criando o objeto e salvando no BD
            Client::create([
                'name' => "Nome do Cliente $i",
            ]);
        }
    }
}
