<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\ImportUser;
use Faker\Generator as Faker;

$factory->define(ImportUser::class, function (Faker $faker) {
    return [
        "first_name" => $faker->name,
        "last_name" => $faker->name,
        "gender" => $faker->randomElement(["M", "F"]),
        "date_of_birth" => $faker->date
    ];
});
