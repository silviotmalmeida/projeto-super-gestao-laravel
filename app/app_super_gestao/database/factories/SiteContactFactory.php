<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\SiteContact;
use Faker\Generator as Faker;

// importando a model para consulta dos motivos de contato
use App\ContactReason;

$factory->define(SiteContact::class, function (Faker $faker) {

    // consultando o valor do último motivo cadastrado
    $reason_range = ContactReason::max('id');

    return [
        // populando os dados de teste com a biblioteca faker
        'name' => $faker->name,
        'phone' => $faker->tollFreePhoneNumber,
        'email' => $faker->unique()->email,
        'contact_reasons_id' => $faker->numberBetween(1, $reason_range),
        'message' => $faker->text(200)
    ];
});
