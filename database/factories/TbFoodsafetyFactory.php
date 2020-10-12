<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\tb_district;
use App\Models\tb_foodsafety;
use App\Models\tb_foodsafety_types;
use App\Models\tb_users;
use Faker\Generator as Faker;

$factory->define(tb_foodsafety::class, function (Faker $faker) {
    return [
        'fds_title' => $faker->word,
        'slug' => $faker->slug,
        'fds_desc' => $faker->text,
        'fds_source' => $faker->word,
        'fds_url' => $faker->word,
        'fds_youtube' => $faker->word,
        'fds_instagram' => $faker->word,
        'fds_facebook' => $faker->word,
        'fds_img' => null,
        'fds_date' => $faker->dateTimeThisMonth()->format('Y-m-d'),
        'fds_enable' => $faker->boolean,
        'fds_id_usr' => factory(tb_users::class),
        'fds_id_fdst' => factory(tb_foodsafety_types::class),
        'fds_id_dst' => factory(tb_district::class),

    ];
});
