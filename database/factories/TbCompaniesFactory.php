<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;
use App\Models\tb_companies;
use App\Models\tb_district;
use App\Models\tb_users;

$factory->define(tb_companies::class, function (Faker $faker) {
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
        'cmp_id_usr' => factory(tb_users::class),
        'cmp_id_dst' => factory(tb_district::class),
        'cmp_id_cmpt' => factory(tb_companies::class),
    ];
});
