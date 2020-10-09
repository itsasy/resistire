<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;
use {{ namespacedModel }};

$factory->define(TbCompanies::class, function (Faker $faker) {
    return [
        'cmp_name' => $faker->word,
        'cmp_img' => $faker->word,
        'cmp_latitude' => $faker->word,
        'cmp_longitude' => $faker->word,
        'cmp_address' => $faker->word,
        'cmp_url' => $faker->word,
        'cmp_instagram' => $faker->word,
        'fds_facebook' => $faker->word,
        'fds_state' => $faker->boolean,
        'cmp_id_usr' => factory(\App\Models\TbUsers::class),
        'cmp_id_dst' => factory(\App\Models\Cmp::class),
        'cmp_id_cmpt' => factory(\App\Models\Cmp::class),
    ];
});
