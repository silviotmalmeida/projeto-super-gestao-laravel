<?php

use Illuminate\Database\Seeder;

// importando a model
use App\Unit;

class UnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // criando o objeto e salvando no BD
        Unit::create([
            'name' => "kg",
            'description' => "quilograma",
        ]);
        Unit::create([
            'name' => "m",
            'description' => "metro",
        ]);
    }
}
