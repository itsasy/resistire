<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\tb_district;
use App\Models\tb_foodsafety_types;
use App\Models\tb_users;
use Faker\Generator as Faker;

$factory->define(tb_foodsafety_types::class, function (Faker $faker) {
    return [
        'fdst_desc' => $faker->text,
        'fdst_id_usr' => factory(tb_users::class),
        'fdst_id_dst' =>factory(tb_district::class),
    ];
});
