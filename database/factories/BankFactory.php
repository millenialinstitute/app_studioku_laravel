<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Bank;
use Faker\Generator as Faker;

$factory->define(Bank::class, function (Faker $faker) {
    return [
		'name'        => $faker->creditCardType,
		'customer'    => $faker->name,
		'card_number' => $faker->creditCardNumber,
    ];
});
