<?php

use Illuminate\Database\Seeder;

// importando a model
use App\SiteContact;

class SiteContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // criando os registros de teste no BD usando a factory e o faker
        factory(SiteContact::class, 100)->create();
    }
}
