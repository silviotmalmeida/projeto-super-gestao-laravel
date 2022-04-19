<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\SiteContact;
use Faker\Generator as Faker;

$factory->define(SiteContact::class, function (Faker $faker) {
    return [
        // populando os dados de teste com a biblioteca faker
        'name' => $faker->name,
        'phone' => $faker->tollFreePhoneNumber,
        'email' => $faker->unique()->email,
        'reason' => $faker->numberBetween(1, 3),
        'message' => $faker->text(200)
    ];
});
