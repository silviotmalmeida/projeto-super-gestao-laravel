<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);

        // listando os seeders a serem disparados
        // $this->call(ContactReasonSeeder::class);
        // $this->call(SiteContactSeeder::class);
        // $this->call(ProviderSeeder::class);
        // $this->call(UnitSeeder::class);
        $this->call(ProductSeeder::class);
    }
}
