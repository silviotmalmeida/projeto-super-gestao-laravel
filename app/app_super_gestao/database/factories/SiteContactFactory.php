<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\SiteContact;
use Faker\Generator as Faker;

// importando a model para consulta dos motivos de contato
use App\ContactReason;

$factory->define(SiteContact::class, function (Faker $faker) {

    // consultando o valor do último motivo cadastrado
    $reasonRange = ContactReason::max('id');

    return [
        // populando os dados de teste com a biblioteca faker
        'name' => $faker->name,
        'phone' => $faker->tollFreePhoneNumber,
        'email' => $faker->unique()->email,
        'contact_reasons_id' => $faker->numberBetween(1, $reasonRange),
        'message' => $faker->text(200)
    ];
});
