<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;
use App\Models\tb_company_types;

$factory->define(tb_company_types::class, function (Faker $faker) {
    return [
        'cmpt_desc' => $faker->text,
    ];
});
