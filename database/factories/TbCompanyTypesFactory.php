<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;
use {{ namespacedModel }};

$factory->define(TbCompanyTypes::class, function (Faker $faker) {
    return [
        'cmpt_desc' => $faker->text,
    ];
});
