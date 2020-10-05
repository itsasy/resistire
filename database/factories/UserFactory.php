<?php

use App\Models\tb_users;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(tb_users::class, function (Faker $faker) {
    return [
        'usr_document' => $faker->unique()->bankAccountNumber,
        'usr_patname' => $faker->lastName,
        'usr_matname' => $faker->lastName,
        'usr_name' => $faker->name,
        'usr_birthdate'=> $faker->date,
        'usr_id_gnd' => $faker->numberBetween(1, 2),
        'usr_id_dst' => $faker->randomDigit,
        'usr_address' => $faker->address,
        'usr_email' => $faker->unique()->safeEmail,
        'usr_phone_1' => $faker->phoneNumber,
        'usr_phone_2' => $faker->phoneNumber,
        'username' => $faker->userName,
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
        'usr_type_id' => $faker->numberBetween(1, 2),
        'usr_enable' => $faker->numberBetween(1, 2),
    ];
});
