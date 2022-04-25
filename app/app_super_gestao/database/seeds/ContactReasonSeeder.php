<?php

use Illuminate\Database\Seeder;

// importando a model
use App\ContactReason;

class ContactReasonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // criando o objeto e salvando no BD
        ContactReason::create(['reason' => "Dúvida"]);
        ContactReason::create(['reason' => "Elogio"]);
        ContactReason::create(['reason' => "Reclamação"]);
    }
}
