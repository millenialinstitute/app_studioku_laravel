<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\ItemReject;
use Faker\Generator as Faker;

$factory->define(ItemReject::class, function (Faker $faker) {
    return [
        'title'       => $this->faker->sentences($nb = 1 , $variableNbRowds = true),
        'description' => $this->faker->text($maxNbChars = 100),
    ];
});
