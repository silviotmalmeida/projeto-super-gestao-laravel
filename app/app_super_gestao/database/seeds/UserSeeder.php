<?php

use Illuminate\Database\Seeder;

// importando a model
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // criando o usuário root
        User::create([
            'name' => "root",
            'email' => "root@email.com",
            'password' => "123456"
        ]);
    }
}
