<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model\tb_foodsafety_types;
use Faker\Generator as Faker;

$factory->define(tb_foodsafety_types::class, function (Faker $faker) {
    return [
        'fdst_desc' => $faker->text,
    ];
});
