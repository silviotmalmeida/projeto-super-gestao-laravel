<?php

use Illuminate\Database\Seeder;

// importando a model
use App\Provider;

class ProviderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // criando a lista de uf
        $states = [
            'AC', 'AL', 'AP', 'AM', 'BA', 'CE', 'DF', 'ES', 'GO',
            'MA', 'MT', 'MS', 'MG', 'PA', 'PB', 'PR', 'PE', 'PI',
            'RJ', 'RN', 'RS', 'RO', 'RR', 'SC', 'SP', 'SE', 'TO'
        ];

        // laço para criação dos dados
        for ($i = 1; $i <= 25; $i++) {

            // sorteando um uf
            $choice = array_rand($states);

            // criando o objeto e salvando no BD
            Provider::create([
                'name' => "Fornecedor $i",
                'site' => "fornecedor$i.com.br",
                'uf' => $states[$choice],
                'email' => "fornecedor$i@email.com.br"
            ]);
        }
    }
}
