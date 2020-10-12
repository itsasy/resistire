<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;
use App\Models\tb_district;

$factory->define(tb_district::class, function (Faker $faker) {
    return [
        'dst_id_prv' => $faker->randomNumber,
        'dst_name' => $faker->city,
    ];
});
